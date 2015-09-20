<script type="text/javascript">
requirejs.config({
	baseUrl: 'http://vuslinterliga.com/',
	paths: {
		fab : 'media/com_fabrik/js',
		element : 'plugins/fabrik_element',
		list : 'plugins/fabrik_list',
		form : 'plugins/fabrik_form',
		cron : 'plugins/fabrik_cron',
		viz : 'plugins/fabrik_visualization',
		admin : 'administrator/components/com_fabrik/views',
		adminfields : 'administrator/components/com_fabrik/models/fields',
		punycode : 'media/system/js/punycode'},
	shim: {"fab\/fabrik-min":{"deps":["fab\/mootools-ext-min","fab\/lib\/Event.mock","fab\/tipsBootStrapMock-min","fab\/encoder-min"]},"fab\/window-min":{"deps":["fab\/fabrik-min"]},"fab\/elementlist-min":{"deps":["fab\/fabrik-min","fab\/element-min"]},"fab\/list-min":{"deps":["fab\/fabrik-min","fab\/listfilter-min","fab\/advanced-search-min","fab\/encoder-min"]}},
	waitSeconds: 30,
});


requirejs(['fab/fabrik-min', 'fab/tipsBootStrapMock-min'], function () {
	Fabrik.liveSite = 'http://vuslinterliga.com/';
	Fabrik.debug = false;
	Fabrik.bootstrapped = true;
	Fabrik.tips = new FloatingTips('.fabrikTip', {"tipfx":"Fx.Transitions.Linear","duration":"500","distance":20,"fadein":false});
	Fabrik.addEvent('fabrik.list.updaterows', function () {
		// Reattach new tips after list redraw
		Fabrik.tips.attach('.fabrikTip');
	});
	Fabrik.addEvent('fabrik.plugin.inlineedit.editing', function () {
		Fabrik.tips.hideAll();
	});
	Fabrik.addEvent('fabrik.list.inlineedit.setData', function () {
		Fabrik.tips.attach('.fabrikTip');
	});
});


requirejs(['fab/fabrik-min', 'fab/window-min', 'fab/list-min'], function () {
window.addEvent('domready', function () {
	var list = new FbList('1',
	{"admin":false,"ajax":0,"ajax_links":false,"links":{"detail":"","edit":"","add":""},"filterMethod":"onchange","advancedFilters":[],"form":"listform_1_com_fabrik_1","headings":"['vusl___Date','vusl___Field','vusl___Time','vusl___Home','vusl___Visitor']","labels":{"vusl___Date":"Date:","vusl___Field":"Field:","vusl___Time":"Time:","vusl___Home":"Home Team:","vusl___Visitor":"Visitor Team:","fabrik_actions":""},"primaryKey":"`vusl`.`id`","Itemid":"610","listRef":"1_com_fabrik_1","formid":"1","canEdit":"1","canView":"1","page":"\/index.php\/2015-01-30-17-48-58","isGrouped":false,"toggleCols":false,"j3":true,"singleOrdering":false,"formels":[{"name":"id","label":"id"},{"name":"date_time","label":"date time"}],"fabrik_show_in_list":[],"csvChoose":false,"popup_width":"","popup_height":"","popup_edit_label":"Edit","popup_view_label":"View","popup_add_label":"Add","limitLength":"10","limitStart":0,"tmpl":"bootstrap","csvOpts":{"excel":0,"inctabledata":1,"incraw":1,"inccalcs":0,"custom_qs":"","incfilters":0},"csvFields":[],"data":[[{"data":{"vusl___id":"1","vusl___id_raw":"1","vusl___date_time":"2015-02-06 17:29:46","vusl___date_time_raw":"2015-02-06 17:29:46","vusl___Date":"","vusl___Date_raw":"0000-00-00 00:00:00","vusl___Field":"Select a Field","vusl___Field_raw":"Select a Field","vusl___Time":"Select a Time","vusl___Time_raw":"Select a Time","vusl___Home":"Select a Team","vusl___Home_raw":"Select a Team","vusl___Visitor":"Select a Team","vusl___Visitor_raw":"Select a Team","slug":"1","__pk_val":"1","fabrik_select":"","fabrik_view_url":"\/index.php\/2015-01-30-17-48-58\/details\/1\/1","fabrik_edit_url":"\/index.php\/2015-01-30-17-48-58\/form\/1\/1","fabrik_view":"<a data-loadmethod=\"xhr\" class=\"btn fabrik_view fabrik__rowlink\" data-list=\"list_1_com_fabrik_1\" href=\"\/index.php\/2015-01-30-17-48-58\/details\/1\/1\" title=\"View\"><i class=\"icon-search \" ><\/i> <span class=\"hidden\">View<\/span><\/a>","fabrik_edit":"<a data-loadmethod=\"xhr\" class=\"btn fabrik_edit fabrik__rowlink\" data-list=\"list_1_com_fabrik_1\" href=\"\/index.php\/2015-01-30-17-48-58\/form\/1\/1\" title=\"Edit\"><i class=\"icon-edit \" ><\/i> <span class=\"hidden\">Edit<\/span><\/a>","fabrik_actions":"<div class=\"btn-group\">\n<a data-loadmethod=\"xhr\" class=\"btn fabrik_edit fabrik__rowlink\" data-list=\"list_1_com_fabrik_1\" href=\"\/index.php\/2015-01-30-17-48-58\/form\/1\/1\" title=\"Edit\"><i class=\"icon-edit \" ><\/i> <span class=\"hidden\">Edit<\/span><\/a> <a data-loadmethod=\"xhr\" class=\"btn fabrik_view fabrik__rowlink\" data-list=\"list_1_com_fabrik_1\" href=\"\/index.php\/2015-01-30-17-48-58\/details\/1\/1\" title=\"View\"><i class=\"icon-search \" ><\/i> <span class=\"hidden\">View<\/span><\/a><\/div>\n"},"cursor":1,"total":2,"id":"list_1_com_fabrik_1_row_1","class":"fabrik_row oddRow0"},{"data":{"vusl___id":"2","vusl___id_raw":"2","vusl___date_time":"2015-02-06 17:29:51","vusl___date_time_raw":"2015-02-06 17:29:51","vusl___Date":"2015-02-06","vusl___Date_raw":"2015-02-06 00:00:00","vusl___Field":"Fresno","vusl___Field_raw":"Fresno","vusl___Time":"9:00 am","vusl___Time_raw":"9:00 am","vusl___Home":"Jalisco S.C","vusl___Home_raw":"Jalisco S.C","vusl___Visitor":"Reedley","vusl___Visitor_raw":"Reedley","slug":"2","__pk_val":"2","fabrik_select":"","fabrik_view_url":"\/index.php\/2015-01-30-17-48-58\/details\/1\/2","fabrik_edit_url":"\/index.php\/2015-01-30-17-48-58\/form\/1\/2","fabrik_view":"<a data-loadmethod=\"xhr\" class=\"btn fabrik_view fabrik__rowlink\" data-list=\"list_1_com_fabrik_1\" href=\"\/index.php\/2015-01-30-17-48-58\/details\/1\/2\" title=\"View\"><i class=\"icon-search \" ><\/i> <span class=\"hidden\">View<\/span><\/a>","fabrik_edit":"<a data-loadmethod=\"xhr\" class=\"btn fabrik_edit fabrik__rowlink\" data-list=\"list_1_com_fabrik_1\" href=\"\/index.php\/2015-01-30-17-48-58\/form\/1\/2\" title=\"Edit\"><i class=\"icon-edit \" ><\/i> <span class=\"hidden\">Edit<\/span><\/a>","fabrik_actions":"<div class=\"btn-group\">\n<a data-loadmethod=\"xhr\" class=\"btn fabrik_edit fabrik__rowlink\" data-list=\"list_1_com_fabrik_1\" href=\"\/index.php\/2015-01-30-17-48-58\/form\/1\/2\" title=\"Edit\"><i class=\"icon-edit \" ><\/i> <span class=\"hidden\">Edit<\/span><\/a> <a data-loadmethod=\"xhr\" class=\"btn fabrik_view fabrik__rowlink\" data-list=\"list_1_com_fabrik_1\" href=\"\/index.php\/2015-01-30-17-48-58\/details\/1\/2\" title=\"View\"><i class=\"icon-search \" ><\/i> <span class=\"hidden\">View<\/span><\/a><\/div>\n"},"cursor":2,"total":2,"id":"list_1_com_fabrik_1_row_2","class":"fabrik_row oddRow1"}]],"groupByOpts":{"isGrouped":false,"collapseOthers":false,"startCollapsed":false,"bootstrap":true},"rowtemplate":"<tr id=\"\" class=\"fabrik_row\">\n\t\t\t<td class=\"vusl___Date fabrik_element fabrik_list_1_group_1\" >\n\t\t\t\t\t<\/td>\n\t\t\t<td class=\"vusl___Field fabrik_element fabrik_list_1_group_1\" >\n\t\t\t\t\t<\/td>\n\t\t\t<td class=\"vusl___Time fabrik_element fabrik_list_1_group_1\" >\n\t\t\t\t\t<\/td>\n\t\t\t<td class=\"vusl___Home fabrik_element fabrik_list_1_group_1\" >\n\t\t\t\t\t<\/td>\n\t\t\t<td class=\"vusl___Visitor fabrik_element fabrik_list_1_group_1\" >\n\t\t\t\t\t<\/td>\n\t\t\t<td class=\"fabrik_actions fabrik_element\" >\n\t\t\t\t\t<\/td>\n\t<\/tr>","winid":""}
	);
	Fabrik.addBlock('list_1_com_fabrik_1', list);
	Fabrik.filter_listform_1_com_fabrik_1 = new FbListFilter({"container":"listform_1_com_fabrik_1","type":"list","id":1,"ref":"1_com_fabrik_1","advancedSearch":{"controller":"list"}});
Fabrik.filter_listform_1_com_fabrik_1.update();


})
});


</script>