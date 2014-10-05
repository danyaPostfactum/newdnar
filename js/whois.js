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

		Handlebars.registerHelper('if_R01', function(registrar, opts) {
			if (registrar == 'R01-RU') {
				return opts.fn(this)
			} else {
				return opts.inverse(this);
			}
		});
		
		Handlebars.registerHelper('if_RuSuRf', function(tld, opts) {
			if (tld === "ru" || tld == "su" || tld == 'xn--p1ai') {
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

	inputProps: {
		isRussian: false
	},

	checkForRussian: function(input) {
		var self = this;
		if (self.config.searchField.val().charCodeAt(0) > 1071) {
			self.inputProps.isRussian = true;
			return true;
		} else {
			self.inputProps.isRussian = false;
			return false;
		}
	},

	fetchQueryArray: function() {
		var self = this;
		var query = self.config.searchField.val();
		if (self.checkForRussian(query)) {
			query = punycode.toASCII(query);
		}
		$.ajax({
			type: 'GET',
			url: 'index.php',
			data: {q: punycode.toASCII( self.config.searchField.val() )},
			dataType: 'json',
			success: function(domainArray) {
				console.log('got smth', domainArray);
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

		if (self.inputProps.isRussian) {
			var domain = null;
			if (domainArray.TLDisset) {
				var domainString = domainArray.domain_name + domainArray.TLD;
				domain = domainArray.TLD.slice(1);
			} else {
				var domainString = domainArray.domain_name + punycode.toASCII('.рф');
				domain = punycode.toASCII("рф");
			}
			// search for russian domain
			self.clearWhoisResults();
			self.fetchDomainWhois(domainString);
			self.createWrappers( {domains: [domain], name: domainArray.domain_name} );
			this.initiateProgress(1);

		} else if (domainArray.TLDisset) {
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
		console.log(whoisArray);
		this.updateBtnProgress(this);
		var domainName = whoisArray.domain.name;
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

var domains = ['ru', 'com', 'su', 'net', 'org', 'me', 'biz', 'info', 'mobi', 'name', 'tv', 'in', 'mn', 'cc', 'ws', 'bz', 'asia', 'xn--p1ai', 'us', 'tel', 'kz'];

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


var registrarsObj = {
  "101DOMAIN-REG-RF": {
    "id": 598,
    "short_name": "101DOMAIN-RU",
    "url": "www.101domain.ru"
  },
  "AGAVA-REG-RF": {
    "id": 599,
    "short_name": "AGAVA-RU",
    "url": "www.hosting.agava.ru/ domains/"
  },
  "AXELNAME-REG-RF": {
    "id": 600,
    "short_name": "AXELNAME-RU",
    "url": "http://axelname.ru"
  },
  "ARDIS-REG-RF": {
    "id": 601,
    "short_name": "ARDIS-RU",
    "url": "http://ardis.ru"
  },
  "BEELINE-REG-RF": {
    "id": 602,
    "short_name": "BEELINE-RU",
    "url": "www.beeline.ru"
  },
  "DEMOS-REG-RF": {
    "id": 603,
    "short_name": "DEMOS-RU",
    "url": "https://reg.demos.ru"
  },
  "WEBNAMES-REG-RF": {
    "id": 604,
    "short_name": "WEBNAMES-RU",
    "url": "http://webnames.ru"
  },
  "CARAVAN-REG-RF": {
    "id": 605,
    "short_name": "CARAVAN-RU",
    "url": "www.caravan.ru"
  },
  "CT-REG-RF": {
    "id": 606,
    "short_name": "CT-RU",
    "url": "www.regplanet.ru"
  },
  "NAUNET-REG-RF": {
    "id": 607,
    "short_name": "NAUNET-RU",
    "url": "www.naunet.ru"
  },
  "NETFOX-REG-RF": {
    "id": 608,
    "short_name": "NETFOX-RU",
    "url": "www.netfox.ru"
  },
  "UNINIC-REG-RF": {
    "id": 609,
    "short_name": "UNINIC-RU",
    "url": "http://uninic.ru/"
  },
  "CENTRALREG-REG-RF": {
    "id": 610,
    "short_name": "CENTRALREG-RU",
    "url": "http://centralreg.ru/"
  },
  "REGGI-REG-RF": {
    "id": 611,
    "short_name": "REGGI-RU",
    "url": "www.reggi.ru"
  },
  "RUCENTER-REG-RF": {
    "id": 612,
    "short_name": "RU-CENTER-RU",
    "url": "www.nic.ru"
  },
  "REGRU-REG-RF": {
    "id": 613,
    "short_name": "REGRU-RU",
    "url": "www.reg.ru"
  },
  "REGISTR1-REG-RF": {
    "id": 614,
    "short_name": "REGISTR1-RU",
    "url": "http://registr1.ru/"
  },
  "REGISTRANT-RU": {
    "id": 615,
    "short_name": "",
    "url": "www.registrant.ru"
  },
  "DOMENUS-REG-RF": {
    "id": 616,
    "short_name": "DOMENUS-RU",
    "url": "www.domenus.ru"
  },
  "REGISTRATOR-REG-RF": {
    "id": 617,
    "short_name": "REGISTRATOR-RU",
    "url": "www.mastername.ru"
  },
  "R01-REG-RF": {
    "id": 618,
    "short_name": "R01-RU",
    "url": "www.r01.ru"
  },
  "REGTIME-REG-RF": {
    "id": 619,
    "short_name": "REGTIME-RU",
    "url": "www.webnames.ru"
  },
  "RTCOMM-REG-RF": {
    "id": 620,
    "short_name": "RTCOMM-RU",
    "url": "www.rtcomm.ru"
  },
  "RUNET-REG-RF": {
    "id": 621,
    "short_name": "RUNET-RU",
    "url": "runetproekt.ru"
  },
  "SALENAMES-REG-RF": {
    "id": 622,
    "short_name": "SALENAMES-RU",
    "url": "www.salenames.ru"
  },
  "REGFORMAT-REG-RF": {
    "id": 623,
    "short_name": "REGFORMAT-RU",
    "url": "www.regformat.ru"
  },
  "ELVIS-REG-RF": {
    "id": 624,
    "short_name": "ELVIS-RU",
    "url": "www.getname.ru"
  }
};