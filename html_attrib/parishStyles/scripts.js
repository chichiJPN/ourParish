/*
	CLASS: ListViewer
	----------------------
*/

/*
	CLASS: ListSwitcher
	----------------------
*/
function ListSwitcher()
{
	this.pageNum = 0;
	this.lists = {};
	var base_url = $("#init").data('base_url');
	console.log(base_url + '1');
	this.lists["0"] = base_url + "index.php/parish_site/listOne";
	this.lists["1"] = base_url + "index.php/parish_site/listTwo";
	this.lists["2"] = base_url + "index.php/parish_site/listThree";

	this.init = function()
	{
		document.getElementById("init").innerHTML = "<meta name =\"viewport\" content = \"width=device-width, initial-scale = 1.0\">"+
		'<link href = "'+base_url+'html_attrib/parishStyles/css/bootstrap_2.css" rel = "stylesheet">'+
		'<link href = "'+base_url+'html_attrib/parishStyles/css/styles.css" rel = "stylesheet">'+
		'<link rel="stylesheet" type="text/css" href="'+base_url+'html_attrib/parishStyles/css/parishStyle.css" media="screen"></style>';
	};

	var closure = function(ref, page)
	{
		return function()
		{
			ref.pageNum = page;
			document.getElementById("myframe").src = ref.lists["" + page];		
		};
	};

	var decrementingClosure = function(ref)
	{
		return function()
		{
			if(ref.pageNum-1 < 0) return;
			document.getElementById("myframe").src = ref.lists["" + ref.pageNum-1];
			document.getElementById("" + (ref.pageNum-1)).className = "active";
			document.getElementById("" + (ref.pageNum)).className = "";

			ref.pageNum--;
		};
	};

	var incrementingClosure = function(ref)
	{
		return function()
		{
			if(ref.pageNum+1 > 2) return;
			document.getElementById("myframe").src = ref.lists["" + (ref.pageNum+1)];
			document.getElementById("" + (ref.pageNum+1)).setAttribute("class", "active");
			document.getElementById("" + (ref.pageNum)).setAttribute("class", "");

			ref.pageNum++;
		};
	};

	this.view = function()
	{
		var ul = document.getElementById('pages');
		var ref = this;

		var decrement_page = document.createElement('li');
		var a = document.createElement("a");
		a.setAttribute("href", "#");

		a.onclick = decrementingClosure(ref);
		a.appendChild(document.createTextNode("<<"));

		decrement_page.appendChild(a);
		ul.appendChild(decrement_page);

		var count = 0;
		for(var key in this.lists)
		{
			var li = document.createElement('li');
			li.setAttribute("id", "" + count);
			if(count == 0)
				li.setAttribute("class", "active");

			var a = document.createElement("a");
			a.setAttribute("data-toggle", "tab");
			a.setAttribute("href", "#");
		
			a.onclick = closure(ref, count);

			a.appendChild(document.createTextNode("" + (count+1)));

			li.appendChild(a);
			ul.appendChild(li);
			count++;
		}

		var increment_page = document.createElement('li');
		var b = document.createElement("a");
		b.setAttribute("href", "#");

		b.onclick = incrementingClosure(ref);
		b.appendChild(document.createTextNode(">>"));

		increment_page.appendChild(b);
		ul.appendChild(increment_page);
	};
};

/*
	CLASS: ViewSwitcher
	----------------------
*/
function ViewSwitcher()
{
	this.views = {};
	var base_url = $("#init").data('base_url');	
	this.views["thumbnails"] = base_url+"index.php/parish_site/thumbnails";
	this.views["list"] = base_url+"index.php/parish_site/lists";

	this.init = function()
	{
		document.getElementById("init").innerHTML = '<meta name ="viewport" content = "width=device-width, initial-scale = 1.0">'+
		'<link href = "'+base_url+'html_attrib/parishStyles/css/bootstrap_2.css" rel = "stylesheet">'+
		'<link href = "'+base_url+'html_attrib/parishStyles/css/styles.css" rel = "stylesheet">'+
		'<link rel="stylesheet" type="text/css" href= "'+base_url+'html_attrib/parishStyles/css/parishStyle.css" media="screen"></style>';
	};

	var closure = function(ref, key)
	{
		return function()
		{
			document.getElementById("myframe").src = ref.views[key];		
		};
	};

	this.setView = function()
	{
		var ul = document.getElementById('views');
		var ref = this;

		var count = 0;
		for(var key in this.views)
		{
			var li_divider = document.createElement('li');
			li_divider.setAttribute("class", "divider");

			var li = document.createElement('li');
			if(count == 0)
				li.setAttribute("class", "active");

			var a = document.createElement("a");
			a.setAttribute("data-toggle", "tab");
			a.setAttribute("href", "#");
			a.setAttribute("id", "" + count);
		
			a.onclick = closure(ref, key);

			a.appendChild(document.createTextNode(key));

			li.appendChild(a);
			ul.appendChild(li_divider);
			ul.appendChild(li);
			count++;
		}
	};
};

/*
	CLASS: MonthSwitcher
	----------------------
*/
function MonthSwitcher()
{
	this.months = {};
	var base_url = $("#init").data('base_url');
	
	//kani buh.. eror kung uncomment
	//this.views["thumbnails"] = base_url+"index.php/parish_site/thumbnails";
	this.months["January 2014"] = base_url+"index.php/parish_site/months/january";
	this.months["February 2014"] = base_url+"index.php/parish_site/months/febuary";
	this.months["March 2014"] = base_url+"index.php/parish_site/months/march";
	this.months["April 2014"] = base_url+"index.php/parish_site/months/april";
	this.months["May 2014"] = base_url+"index.php/parish_site/months/may";
	this.months["June 2014"] = base_url+"index.php/parish_site/months/june";
	this.months["July 2014"] = base_url+"index.php/parish_site/months/july";
	this.months["August 2014"] = base_url+"index.php/parish_site/months/august";
	this.months["September 2014"] = base_url+"index.php/parish_site/months/september";
	this.months["October 2014"] = base_url+"index.php/parish_site/months/october";
	this.months["November 2014"] = base_url+"index.php/parish_site/months/november";
	this.months["December 2014"] = base_url+"index.php/parish_site/months/december";

	this.init = function()
	{
		document.getElementById("init").innerHTML = '<meta name ="viewport" content = "width=device-width, initial-scale = 1.0">'+
		'<link href = "'+base_url+'html_attrib/parishStyles/css/bootstrap_2.css" rel = "stylesheet">'+
		'<link href = "'+base_url+'html_attrib/parishStyles/css/styles.css" rel = "stylesheet">'+
		'<link rel="stylesheet" type="text/css" href="'+base_url+'html_attrib/parishStyles/css/newStyle.css" media="screen"></style>';
	};

	var closure = function(ref, key)
	{
		return function()
		{
			document.getElementById("myframe").src = ref.months[key];		
		};
	};

    this.getMonths = function()
	{
		var ul = document.getElementById('months');
		var ref = this;

		var count = 0;
		for(var key in this.months)
		{
			var li = document.createElement('li');
			if(count == 0)
				li.setAttribute("class", "active");

			var a = document.createElement("a");
			a.setAttribute("data-toggle", "tab");
			a.setAttribute("href", "#");
			a.setAttribute("id", "" + count);
		
			a.onclick = closure(ref, key);

			a.appendChild(document.createTextNode(key));

			li.appendChild(a);
			ul.appendChild(li);
			count++;
		}
	};
};

/*
	CLASS: ServiceSwitcher
	----------------------
*/
function ServiceSwitcher()
{
	this.urls = {};
	var base_url = $("#init").data('base_url');
	
	this.urls["Reading of the Day"] = base_url + "index.php/parish_site/sched/read"; //goes to readsched.php
	this.urls["Mass Schedule"] = base_url + "index.php/parish_site/sched/mass"; //goes to massSched.php
	this.urls["Baptism"] = base_url + "index.php/parish_site/sched/bapt"; //goes to baptSched.php
	this.urls["Confession"] = base_url + "index.php/parish_site/sched/confess"; //goes to confessSched.php
	this.urls["Confirmation"] = base_url + "index.php/parish_site/sched/confirm"; //goes to ConfirmSched.php

	this.init = function()
	{
		document.getElementById("init").innerHTML = '<meta name ="viewport" content = "width=device-width, initial-scale = 1.0">'+
		'<link href = "'+base_url+'html_attrib/parishStyles/services/servbootstrap.css" rel = "stylesheet">'+ '<link href = "'+base_url+'html_attrib/parishStyles/css/styles.css" rel = "stylesheet">'+
		'</style><link rel="stylesheet" type="text/css" href="'+base_url+'html_attrib/parishStyles/services/servparishStyle.css" media="screen"></style>';
	};

	var closure = function(ref, key)
	{
		return function()
		{
			document.getElementById("myframe").src = ref.urls[key];		
		};
	};

	this.switch = function()
	{
		var ul = document.getElementById('services')
		var ref = this;

		var count = 0;
		for(var key in this.urls)
		{
			var li = document.createElement('li');
			if(count == 0)
				li.setAttribute("class", "active");

			var a = document.createElement("a");
			a.setAttribute("data-toggle", "tab");
			a.setAttribute("href", "#");
			a.setAttribute("id", "" + count);
		
			a.onclick = closure(ref, key);

			a.appendChild(document.createTextNode(key));

			li.appendChild(a);
			ul.appendChild(li);
			count++;
		}
	};
};

/*
	ABSTRACT CLASS: Helper
	--------------------------
*/
function Helper()
{
	var base_url = $("#init").data('base_url');
	this.init = function()
	{
		document.getElementById("init").innerHTML = '<meta name ="viewport" content = "width=device-width, initial-scale = 1.0"><link href = "'+base_url+'html_attrib/parishStyles/css/servbootstrap.css" rel = "stylesheet"><link href = "'+base_url+'html_attrib/parishStyles/css/styles.css" rel = "stylesheet"><link rel="stylesheet" type="text/css" href="'+base_url+'html_attrib/parishStyles/css/parishStyle.css" media="screen"></style>';
	};
};

/* 
	CLASS: MassSchedulerHelper
	--------------------------
*/
function MassSchedulerHelper()
{
	this.schedules = {}; // a private hash
	this.days = {};
	this.languages = {};

	this.schedules["Any"] = "Any";
    this.schedules["00:15AM"] = "12:30AM";
    this.schedules["00:30AM"] = "12:30AM";
    this.schedules["00:45AM"] = "12:30AM";
    this.schedules["01:00AM"] = "01:00AM";
    this.schedules["01:15AM"] = "01:15AM";
    this.schedules["01:30AM"] = "01:30AM";
    this.schedules["01:45AM"] = "01:45AM";
    this.schedules["02:00AM"] = "02:00AM";
    this.schedules["02:15AM"] = "02:15AM";
    this.schedules["02:30AM"] = "02:30AM";
    this.schedules["02:45AM"] = "02:45AM";
    this.schedules["03:00AM"] = "03:00AM";
    this.schedules["03:15AM"] = "03:30AM";
    this.schedules["03:30AM"] = "03:30AM";
    this.schedules["03:45AM"] = "03:30AM";
    this.schedules["04:00AM"] = "04:30AM";
    this.schedules["04:15AM"] = "04:30AM";
    this.schedules["04:30AM"] = "04:30AM";
    this.schedules["04:45AM"] = "04:30AM";
    this.schedules["05:00AM"] = "05:30AM";
    this.schedules["05:15AM"] = "05:30AM";
    this.schedules["05:30AM"] = "05:30AM";
    this.schedules["05:45AM"] = "05:30AM";
    this.schedules["06:00AM"] = "06:30AM";
    this.schedules["06:15AM"] = "06:30AM";
    this.schedules["06:30AM"] = "06:30AM";
    this.schedules["06:45AM"] = "06:30AM";
    this.schedules["07:00AM"] = "07:30AM";
    this.schedules["07:15AM"] = "07:30AM";
    this.schedules["07:30AM"] = "07:30AM";
    this.schedules["07:45AM"] = "07:30AM";
    this.schedules["08:00AM"] = "08:30AM";
    this.schedules["08:15AM"] = "08:30AM";
    this.schedules["08:30AM"] = "08:30AM";
    this.schedules["08:45AM"] = "08:30AM";
    this.schedules["09:00AM"] = "09:30AM";
    this.schedules["09:15AM"] = "09:30AM";
    this.schedules["09:30AM"] = "09:30AM";
    this.schedules["09:45AM"] = "09:30AM";
    this.schedules["10:00AM"] = "10:30AM";
    this.schedules["10:15AM"] = "10:30AM";
    this.schedules["10:30AM"] = "10:30AM";
    this.schedules["10:45AM"] = "10:30AM";
    this.schedules["11:00AM"] = "11:30AM";
    this.schedules["11:15AM"] = "11:30AM";
    this.schedules["11:30AM"] = "11:30AM";
    this.schedules["11:45AM"] = "11:30AM";
    this.schedules["12:00AM"] = "12:30AM";
    this.schedules["12:15AM"] = "12:30AM";
    this.schedules["12:30AM"] = "12:30AM";
    this.schedules["12:45AM"] = "12:30AM";
    this.schedules["13:00AM"] = "12:30AM";
    this.schedules["13:15AM"] = "12:30AM";
    this.schedules["13:30AM"] = "12:30AM";
    this.schedules["13:45AM"] = "12:30AM";
    this.schedules["14:00AM"] = "12:30AM";
    this.schedules["14:15AM"] = "12:30AM";
    this.schedules["14:30AM"] = "12:30AM";
    this.schedules["14:45AM"] = "12:30AM";
    this.schedules["15:00AM"] = "12:30AM";
    this.schedules["15:15AM"] = "12:30AM";
    this.schedules["15:30AM"] = "12:30AM";
    this.schedules["15:45AM"] = "12:30AM";
    this.schedules["16:00AM"] = "12:30AM";
    this.schedules["16:15AM"] = "12:30AM";
    this.schedules["16:30AM"] = "12:30AM";
    this.schedules["16:45AM"] = "12:30AM";
    this.schedules["17:00AM"] = "12:30AM";
    this.schedules["17:15AM"] = "12:30AM";
    this.schedules["17:30AM"] = "12:30AM";
    this.schedules["17:45AM"] = "12:30AM";
    this.schedules["18:00AM"] = "12:30AM";
    this.schedules["18:15AM"] = "12:30AM";
    this.schedules["18:30AM"] = "12:30AM";
    this.schedules["18:45AM"] = "12:30AM";
    this.schedules["19:00AM"] = "12:30AM";
    this.schedules["19:15AM"] = "12:30AM";
    this.schedules["19:30AM"] = "12:30AM";
    this.schedules["19:45AM"] = "12:30AM";
    this.schedules["20:00AM"] = "12:30AM";
    this.schedules["20:15AM"] = "12:30AM";
    this.schedules["20:30AM"] = "12:30AM";
    this.schedules["20:45AM"] = "12:30AM";
    this.schedules["21:00AM"] = "12:30AM";
    this.schedules["21:15AM"] = "12:30AM";
    this.schedules["21:30AM"] = "12:30AM";
    this.schedules["21:45AM"] = "12:30AM";
    this.schedules["22:00AM"] = "12:30AM";
    this.schedules["22:15AM"] = "12:30AM";
    this.schedules["22:30AM"] = "12:30AM";
    this.schedules["22:45AM"] = "12:30AM";
    this.schedules["23:00AM"] = "12:30AM";
    this.schedules["23:15AM"] = "12:30AM";
    this.schedules["23:30AM"] = "12:30AM";
    this.schedules["23:45AM"] = "12:30AM";
    this.schedules["24:00AM"] = "12:30AM";

	this.days["Any"] = "Any";
    this.days["Sunday"] = "Sunday";
    this.days["Monday"] = "Monday";
    this.days["Tuesday"] = "Tuesday";
    this.days["Wednesday"] = "Wednesday";
    this.days["Thursday"] = "Thursday";
    this.days["Friday"] = "Friday";
    this.days["Saturday"] = "Saturday";

    this.languages["Any"] = "Any";
    this.languages["English"] = "English";
    this.languages["Cebuano"] = "Cebuano";

	this.listSchedules = function()
	{
		var selector = document.getElementById('schedules');
		var count = 0;
		for(var key in this.schedules)
		{
			selector.options[count] = new Option(this.schedules[key], key);
			count++;
		}
	};

	this.listDays = function()
	{
		var selector = document.getElementById('days');
		var count = 0;
		for(var key in this.days)
		{
			selector.options[count] = new Option(this.days[key], key);
			count++;
		}
	};

	this.listLanguages = function()
	{
		var division = document.getElementById('languages');
		var flag = 1;
		for(var key in this.languages)
		{
			if(flag == 1)
			{
				flag = 0;
				division.innerHTML += "<div id=\"temp\" class=\"radio col-sm-10\"><label class=\"radio-inline\"><input type=\"radio\" id=\"langButton\" checked=\"true\" name=\"mass-language\" value="+ key +">" + this.languages[key] + "</label></div>";
			}
			else
			{
				division.innerHTML += "<div id=\"temp\" class=\"radio col-sm-10\"><label class=\"radio-inline\"><input type=\"radio\" id=\"langButton\" name=\"mass-language\" value="+ key +">" + this.languages[key] + "</label></div>";
			}
		}
	};
};

// set inheritance
MassSchedulerHelper.prototype = new Helper();
MassSchedulerHelper.constructor = MassSchedulerHelper;