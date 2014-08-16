var WhoisSearch = {
	init: function(config) {
		var self = this;
		this.config = config;
		this.setupTemplates();
		this.bindEvents();
	},

	setupTemplates: function() {
		this.config.tldCardTemplate = Handlebars.compile(this.config.tldCardTemplate);
		this.config.tldCardWrapperTemplate = Handlebars.compile(this.config.tldCardWrapperTemplate);

		Handlebars.registerHelper('if_free', function(registered, opts) {
			if (registered == "no" || registered == "unknown") {
				return opts.fn(this)
			} else {
				return opts.inverse(this);
			}
		});
		Handlebars.registerHelper('if_unknown', function(registered, opts) {
			if (registered == "unknown") {
				return opts.fn(this)
			} else {
				return opts.inverse(this);
			}
		});

		Handlebars.registerHelper('parseRf', function(domain_name) {
			return punycode.toUnicode(domain_name);
		});
	},

	bindEvents: function() {
		var self = this;
		this.config.domainBtn.on('click', function(e) {
			e.preventDefault();
			var ascii_dom = punycode.toASCII( self.config.searchField.val() );
			self.fetchQueryArray();
		});
		this.config.searchField.on('focus keydown', function() {
			$(this).removeClass('error');
		});
	},

	fetchQueryArray: function() {
		var self = this;
		$.ajax({
			type: 'GET',
			url: 'index.php',
			data: {q: punycode.toASCII( self.config.searchField.val() )},
			dataType: 'json',
			success: function(domainArray) {
				self.defineSearchTerms(self, domainArray);
			}
		});
	},

	checkForError: function(self, domainArray) {
		if (typeof domainArray == 'string') {
			var error = $(self.config.domainErrorTemplate.html());
			error.html(domainArray);
			self.config.tldCards.empty().append(error);
			self.config.searchField.addClass('error');
			return true;
		} else {
			return false;
		}
	},

	defineSearchTerms: function(self, domainArray) {
		if (self.checkForError(self, domainArray)) {
			return;
		}
		
		if (domainArray.TLDisset) {
			// search for one
			var domainString = domainArray.domain_name + domainArray.TLD;
			self.clearWhoisResults();
			self.fetchDomainWhois(domainString);
			self.createWrappers( {domains: [domainArray.TLD.slice(1)], name: domainArray.domain_name} );
			this.initiateProgress(1);

		} else {
			// search for as many as set
			var domainsToCheck = self.config.domains.slice(0,self.config.limitTo);
			var domainsQuantity = domainsToCheck.length
			this.initiateProgress(domainsQuantity);
			self.clearWhoisResults();
			self.createWrappers({domains: domainsToCheck, name: domainArray.domain_name});
			for (var i = 0; i<domainsQuantity; i++) {
				var tld = self.config.domains[i];
				var domainString = domainArray.domain_name + '.' + tld;
				self.fetchDomainWhois(domainString);
			}
			console.log('search through all TLDs');
		}
	},

	clearWhoisResults: function() {
		this.config.tldCards.empty();
	},
	createWrappers: function(tld) {
		console.log('creating wrappers for', tld.domains);
		var latinDomains = tld.domains.slice();
		var html = this.config.tldCardWrapperTemplate({domains: latinDomains, name: tld.name } || tld);
		this.config.tldCards.append(html);
	},
	displayWhoisResults: function(whoisArray) {
		console.log(whoisArray)
		this.updateBtnProgress(this);
		var domainName = whoisArray.regrinfo.domain.name;
		var dotPos = domainName.lastIndexOf('.') ;
		var tld = domainName.slice(dotPos + 1);
		// if ( tld == "xn--p1ai" ) { tld = "rf" };
		var html = this.config.tldCardTemplate(whoisArray);
		var domainCard = this.config.tldCards.find("#" + this.config.tldPrefix + tld).empty().append(html);
		this.attachBehavior(domainCard);
	},

	fetchDomainWhois: function(domainName) {
		var self = this;

		$.ajax({
			type: "GET",
			url: "index.php",
			data: { domain_name: domainName },
			dataType: 'json'
		}).success(function(result) {
			console.log('got it');
			self.displayWhoisResults(result);
		}).fail(function(result) {
			console.log('failed to receive whois array');
		});
	},

	initiateProgress: function(length) {
		this.totalProgressLength = length;
		this.currentProgressLength = 0;
		this.progressStep = 100 / this.totalProgressLength;
	},

	updateBtnProgress: function(theobj) {
		var self = theobj;
		var progressLine = self.config.domainBtn.find(self.config.btnProgressName).removeClass(self.config.btnStaticClass);
		this.currentProgressLength += this.progressStep;
		console.log(this.currentProgressLength);
		if ( Math.ceil(this.currentProgressLength) >= 100 ) {
			progressLine.css(this.config.btnProgressStyleName, '100%');
			progressLine.addClass(this.config.btnStaticClass);
			progressLine.css(this.config.btnProgressStyleName, '0');
			this.config.domainBtn.addClass(this.config.btnSuccessClass);
			var self = this;
			setTimeout(function() {
				self.config.domainBtn.removeClass(self.config.btnSuccessClass);
			}, 1500)
		} else {
			progressLine.css(this.config.btnProgressStyleName, this.currentProgressLength + '%');
		}
	},

	attachBehavior: function(elem) {
		var moreWhoisLink = elem.find('.more-whois-info');
		var moreWhoisContent = elem.find('.more-whois-content');
		moreWhoisLink.on('click', function(e) {
			e.preventDefault();
			moreWhoisContent.slideToggle('fast');
		});
	}
};

var domains = ['ru', 'com', 'su', 'net', 'org', 'xn--p1ai', 'biz', 'info', 'mobi', 'name', 'tv', 'in', 'mn', 'cc', 'ws', 'bz', 'asia', 'me', 'us', 'tel', 'kz'];

// Initialize whois search
var whoisSearchObj = Object.create(WhoisSearch);
whoisSearchObj.init({
	domainBtn: $("#checkDomainBtn"),
	searchField: $('#domainSearch'),
	btnProgressName: ".progress-inner",
	btnStaticClass: "notransition",
	btnSuccessClass: "state-success",
	btnProgressStyleName: "width",
	tldCardTemplate: $("#tld-card-template").html(),
	tldCardWrapperTemplate: $("#tld-wrapper-template").html(),
	tldPrefix: 'tld-',
	tldCards: $('#searchWhoisWrapper').find('.tld-cards'),
	domainErrorTemplate: $('#error-template'),
	domainErrorContainer: $('.error-holder'),
	domains: domains,
	limitTo: 8
});

// Initialize move domain search
var moveDomainSearchObj = Object.create(WhoisSearch);
moveDomainSearchObj.init({
	searchType: 'moveDomain',
	domainBtn: $("#checkDomainMoveBtn"),
	searchField: $('#domainMove'),
	btnProgressName: ".progress-inner",
	btnStaticClass: "notransition",
	btnSuccessClass: "state-success",
	btnProgressStyleName: "width",
	tldCardTemplate: $("#tld-move-card-template").html(),
	tldCardWrapperTemplate: $("#tld-move-wrapper-template").html(),
	tldPrefix: 'tldMove-',
	tldCards: $('#moveDomainsWrapper').find('.tld-cards'),
	domainErrorTemplate: $('#error-move-template'),
	domainErrorContainer: $('.error-holder'),
	domains: domains,
	limitTo: 8
});
