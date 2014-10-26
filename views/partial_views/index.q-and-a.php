	<!-- FAQ -->
	<article id="questions-and-answers" class="row tab-pane">
		<div class="col-sm-12 center-block q-and-a">
            <table class="faq-table">
<? $qaChapterRows = array_chunk($qaChapters, 2)?>
<? foreach ($qaChapterRows as $row) { ?>
                <tr>
    <? foreach (array_pad($row, 2, null)  as $qaChapter) { ?>
                   <td>
        <? if ($qaChapter) { ?>
                        <h3><?= $qaChapter->get('pagetitle') ?></h3>
            <? $qaSubchapters = $qaChapter->getMany('Children', array('published' => true)); ?>
            <? foreach ($qaSubchapters as $subchapter) { ?>
                        <h4 class="show-more-question"><a href="#" class="show-more"><?= $subchapter->get('pagetitle') ?></a></h4>
                        <div class="show-more-content show-more-answer">
                            <ul>
                <? $links = $subchapter->getMany('Children', array('published' => true)); ?>
                <? foreach ($links as $link) { ?>
                    <li><a href="<?= 'qa/' . $link->get('alias') ?>"><?= $link->get('pagetitle'); ?></a></li>
                <? } ?>
                            </ul>
                        </div>
            <? } ?>
        <? } ?>
                   </td>
    <? } ?>
                </tr>
<? } ?>
</table>
			
			
		</div>
	</article>