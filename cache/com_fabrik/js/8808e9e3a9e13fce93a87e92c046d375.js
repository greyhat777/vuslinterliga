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
	shim: {"fab\/fabrik-min":{"deps":["fab\/mootools-ext-min","fab\/lib\/Event.mock","fab\/tipsBootStrapMock-min","fab\/encoder-min"]},"fab\/window-min":{"deps":["fab\/fabrik-min"]},"fab\/elementlist-min":{"deps":["fab\/fabrik-min","fab\/element-min"]},"fabrik\/form-min":{"deps":["fab\/element-min","lib\/form_placeholder\/Form.Placeholder","fab\/encoder-min"]},"element\/internalid\/internalid-min":{"deps":["fab\/element-min"]},"element\/date\/date-min":{"deps":["fab\/element-min"]},"element\/dropdown\/dropdown-min":{"deps":["fab\/element-min"]}},
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


requirejs(['http://vuslinterliga.com/components/com_fabrik/libs/slimbox2/js/slimbox2.js'], function () {

});


window.addEvent('fabrik.loaded', function() {
  $$('a.fabrikWin').each(function(el, i) {
    el.addEvent('click', function(e) {
    	var opts = {"id":"fabwin","title":"Advanced search","loadMethod":"xhr","minimizable":false,"collapsible":true,"width":500,"height":150};
    	e.stop();
      opts2 = JSON.decode(el.get('rel'));
      opts = Object.merge(opts, opts2 || {});
      opts.contentURL = el.href;
      if (opts.id === 'fabwin') {
      	opts.id += i;
      }
      Fabrik.getWindow(opts);
    });
  });
});
requirejs(['fab/fabrik-min', 'fab/window-min', 'fab/lib/form_placeholder/Form.Placeholder', 'fab/form-min', 'fab/form-submit-min', 'fab/element-min', 'element/internalid/internalid-min', 'fab/elementlist-min', 'element/date/date-min', 'element/dropdown/dropdown-min'], function () {
		var details_1_1 = Fabrik.form('details_1_1', 1, {"admin":false,"ajax":false,"ajaxValidation":false,"showLoader":false,"primaryKey":"vusl___id","error":"Some parts of your form have not been correctly filled in","pages":{"0":[1]},"plugins":[],"multipage_save":0,"editable":false,"print":false,"start_page":0,"inlineMessage":false,"rowid":"1","listid":1,"images":{"alert":"icon-exclamation-sign ","action_check":"icon-action_check ","ajax_loader":"<i class=\"icon-spinner icon-spin\"><\/i>"},"fabrik_window_id":"","submitOnEnter":false,"hiddenGroup":{"1":false},"maxRepeat":{"1":0},"minRepeat":{"1":1},"showMaxRepeats":{"1":false},"join_group_ids":[],"group_repeats":[],"group_joins_ids":[]});
	Fabrik.blocks['details_1_1'].addElements(
{"1":[["FbInternalId","vusl___id_ro",{"repeatCounter":0,"editable":false,"value":"1","label":"id","defaultVal":"","inRepeatGroup":false,"fullName":"vusl___id","watchElements":[],"canRepeat":false,"isGroupJoin":false,"validations":false,"joinid":0}],["FbDateTime","vusl___date_time_ro",{"repeatCounter":0,"editable":false,"value":"2015-02-06 17:29:46","label":"date time","defaultVal":"2015-02-06 17:31:16","inRepeatGroup":false,"fullName":"vusl___date_time","watchElements":[],"canRepeat":false,"isGroupJoin":false,"validations":false,"joinid":0,"hidden":true,"showtime":false,"timelabel":"time","typing":true,"timedisplay":1,"dateTimeFormat":"H:i","allowedDates":[],"watchElement":"","id":"2","calendarSetup":{"inputField":"vusl___date_time_ro","button":"vusl___date_time_ro_cal_img","align":"Tl","singleClick":true,"firstDay":0,"ifFormat":"%Y-%m-%d %H:%M:%S","timeFormat":24,"dateAllowFunc":null},"advanced":false}],["FbDateTime","vusl___Date_ro",{"repeatCounter":0,"editable":false,"value":"0000-00-00 00:00:00","label":"Date:","defaultVal":"","inRepeatGroup":false,"fullName":"vusl___Date","watchElements":[],"canRepeat":false,"isGroupJoin":false,"validations":false,"joinid":0,"hidden":false,"showtime":false,"timelabel":"time","typing":true,"timedisplay":1,"dateTimeFormat":"H:i","allowedDates":[],"watchElement":"","id":"3","calendarSetup":{"inputField":"vusl___Date_ro","button":"vusl___Date_ro_cal_img","align":"Tl","singleClick":true,"firstDay":0,"ifFormat":"%Y-%m-%d","timeFormat":24,"dateAllowFunc":null},"advanced":false}],["FbDropdown","vusl___Field_ro",{"repeatCounter":0,"editable":false,"value":["Select a Field"],"label":"Field:","defaultVal":["Select a Field"],"inRepeatGroup":false,"fullName":"vusl___Field","watchElements":[],"canRepeat":false,"isGroupJoin":false,"validations":false,"joinid":0,"allowadd":false,"data":{"Select a Field":"Select a Field","Fresno":"Fresno","Reedley":"Reedley","Porterville":"Porterville","5 Points":"5 Points"}}],["FbDropdown","vusl___Time_ro",{"repeatCounter":0,"editable":false,"value":["Select a Time"],"label":"Time:","defaultVal":["Select a Time"],"inRepeatGroup":false,"fullName":"vusl___Time","watchElements":[],"canRepeat":false,"isGroupJoin":false,"validations":false,"joinid":0,"allowadd":false,"data":{"Select a Time":"Select a Time","8:00 am":"8:00 am","9:00 am":"9:00 am","10:00 am":"10:00 am","11:00 am":"11:00 am","12:00 pm":"12:00 pm","1:00 pm":"1:00 pm","2:00 pm":"2:00 pm","3:00 pm":"3:00 pm","4:00 pm":"4:00 pm","5:00 pm":"5:00 pm","6:00 pm":"6:00 pm","7:00 pm":"7:00 pm","8:00 pm":"8:00 pm"}}],["FbDropdown","vusl___Home_ro",{"repeatCounter":0,"editable":false,"value":["Select a Team"],"label":"Home Team:","defaultVal":["Select a Team"],"inRepeatGroup":false,"fullName":"vusl___Home","watchElements":[],"canRepeat":false,"isGroupJoin":false,"validations":false,"joinid":0,"allowadd":false,"data":{"Select a Team":"Select a Team","Jalisco S.C":"Jalisco S.C","Reedley":"Reedley","5 Estrellas":"5 Estrellas","Porterville":"Porterville"}}],["FbDropdown","vusl___Visitor_ro",{"repeatCounter":0,"editable":false,"value":["Select a Team"],"label":"Visitor Team:","defaultVal":["Select a Team"],"inRepeatGroup":false,"fullName":"vusl___Visitor","watchElements":[],"canRepeat":false,"isGroupJoin":false,"validations":false,"joinid":0,"allowadd":false,"data":{"Select a Team":"Select a Team","Jalisco S.C":"Jalisco S.C","Reedley":"Reedley","5 Estrellas":"5 Estrellas","Porterville":"Porterville"}}]]}
	);



	new Form.Placeholder('.fabrikForm input');
	function submit_form() {
	return false;
}
function submitbutton(button) {
	if (button=="cancel") {
		document.location = '/index.php/2015-01-30-17-48-58/viewTable?cid=1';
	}
	if (button == "cancelShowForm") {
		return false;
	}
}
});


</script>