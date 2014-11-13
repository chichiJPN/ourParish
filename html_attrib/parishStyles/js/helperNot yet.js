/*
	CLASS: ParishData
	----------------------
*/
function ParishData(thumbnail_src, 
					parish_name, 
					parish_address,
					parish_caption,
					parish_shortDescription,
					parish_page)
{
	this.thumbnail_src = thumbnail_src; // location of thumbnail image
	this.parish_name = parish_name; // name of the parish
	this.parish_address = parish_address; // address of the parish
	this.parish_shortDescription = parish_shortDescription; // a short description about the parish
	this.parish_page = parish_page; // a link or url pointing to the actual parish page
	this.parish_caption = parish_caption;
};

/*
	CLASS: ParishDataContainer
	---------------------------
	NOTE: Array is sorted based on the parish name
*/
function ParishDataContainer()
{
	var list = []; // list of ParishData

	// sorts the list based on the parish name
	this.sort = function()
	{
		list.sort(function(a, b)
		{
			return a.parish_name.localeCompare(b.parish_name);
		});

		return this;
	};

	this.getSize = function() { return list.length; };

	// search the list based on the parish name
	// returns -1 if not found
	// returns the parish data if found
	this.search = function(parish_name)
	{
		for(var a = 0; a < list.length; a++)
		{
			if(list[a].parish_name.match(parish_name))
				return list[a];
		}

		return -1;
	};

	// retrieves an element based on the index
	// returns 0 if there's an error
	this.get = function(index)
	{
		return index > list.length ? 0 : list[index];
	};

	// removes an element in the list based on
	// the parish name
	this.remove = function(parish_name)
	{
		for(var a = 0; a < list.length; a++)
		{
			if(list[a].parish_name.match(parish_name))
				list.splice(a, 1);
		}
	};

	// push an element at the back of the list
	this.push_back = function(parish_data)
	{
		list.push(parish_data);
		return this;
	};

	// pop an element at the back of the list
	// and returns the popped element
	this.pop_back = function()
	{
		var temp = list[list.length - 1];
		list.pop();
		return temp;
	};

	// for debugging purposes
	this.print = function()
	{
		for(var a = 0; a < list.length; a++)
		{
			console.log(list[a].thumbnail_src);
			console.log(list[a].parish_name);
			console.log(list[a].parish_address);
			console.log(list[a].parish_shortDescription);
			console.log(list[a].parish_page);
		}

		return this;
	};
};


/*
	CLASS: ListManager
	----------------------
*/
function ListManager(parishDataContainer, max)
{
	var base_url = $("#init").data('base_url');
	var list = parishDataContainer;

	this.max = max;
	this.pageNum = 0;
	this.maxPages = 0;
	this.lists = {};
	
	this.lists["0"] = "index.php/parish_site/listOne";
	this.lists["1"] = "index.php/parish_site/listTwo";
	this.lists["2"] = "index.php/parish_site/listThree";
	
	// calculate number of pages
	// each page should have 5 parishes displayed
	this.maxPages = Math.round(list.getSize() / max);

	// bounds checking
	if(list.getSize() < max) this.maxPages++;
	
	this.init = function()
	{
		document.getElementById("init").innerHTML = '<meta name ="viewport" content = "width=device-width, initial-scale = 1.0">'+
		'<link href = "'+ base_url +'html_attrib/parishStyles/css/bootstrap_2.css" rel = "stylesheet">'+
		//'<link rel="stylesheet" type="text/css" href="' + base_url + '"html_attrib/parishStyles/css/parishStyle.css" media="screen"></style>'
		//not sure if mao ni nga styles
		'<link href = "'+ base_url +'html_attrib/parishStyles/css/styles.css" rel = "stylesheet">'+
		'<link rel="stylesheet" type="text/css" href="'+ base_url +'html_attrib/parishStyles/css/parishStyle.css" media="screen"></style>';
	};

	var closure = function(ref, page, url)
	{
		return function()
		{
			ref.pageNum = page;
			ref.displayList(url);
			//document.getElementById("parish_display").src = base_url + ref.lists["" + page];
		};
	};

	var decrementingClosure = function(ref, url)
	{
		return function()
		{
			if(ref.pageNum-1 < 0) return;
			document.getElementById("" + (ref.pageNum-1)).className = "active";
			document.getElementById("" + (ref.pageNum)).className = "";
			ref.pageNum--;
			ref.displayList(url);
		};
	};

	var incrementingClosure = function(ref, url)
	{
		return function()
		{
			if(ref.pageNum+1 > ref.maxPages) return;
			document.getElementById("" + (ref.pageNum+1)).setAttribute("class", "active");
			document.getElementById("" + (ref.pageNum)).setAttribute("class", "");
			ref.pageNum++;
			ref.displayList(url);
		};
	};

	this.view = function(url)
	{
		this.displayList(url);
		var ul = document.getElementById('pages');
		var ref = this;

		var decrement_page = document.createElement('li');
		var a = document.createElement("a");
		a.setAttribute("href", "#");

		a.onclick = decrementingClosure(ref, url);
		a.appendChild(document.createTextNode("<<"));

		decrement_page.appendChild(a);
		ul.appendChild(decrement_page);

		for(var count = 0; count < this.maxPages; count++)
		{
			var li = document.createElement('li');
			li.setAttribute("id", "" + count);
			if(count == 0)
				li.setAttribute("class", "active");

			var a = document.createElement("a");
			a.setAttribute("data-toggle", "tab");
			a.setAttribute("href", "#");
		
			a.onclick = closure(ref, count, url);

			a.appendChild(document.createTextNode("" + (count+1)));

			li.appendChild(a);
			ul.appendChild(li);
		}

		var increment_page = document.createElement('li');
		var b = document.createElement("a");
		b.setAttribute("href", "#");

		b.onclick = incrementingClosure(ref, url);
		b.appendChild(document.createTextNode(">>"));

		increment_page.appendChild(b);
		ul.appendChild(increment_page);
	};

	var createParishElement = function(url, a)
	{
		/* parish element */
		var div1 = document.createElement('div');
		div1.setAttribute('class', 'row');

		var div2 = document.createElement('div');
		div2.setAttribute('class', 'col-8 col-lg-9');

		var div3 = document.createElement('div');
		div3.setAttribute('class', 'caption');

		var div4 = document.createElement('div');
		div4.setAttribute('style', 'float:left');

		var img = document.createElement('img');
		img.setAttribute('style', 'display: block;height: 110px; width: 180px; margin-left:60px; margin-right:50px; margin-bottom: 30px');
		img.setAttribute('class', 'img-rounded');
		img.src = url + '/html_attrib/parishStyles/images/'+list.get(a).thumbnail_src;
		div4.appendChild(img);

		div3.appendChild(div4);
		div3.appendChild(document.createElement('br'));

		var a1 = document.createElement('a');
		a1.setAttribute('data-toggle', 'modal');
		a1.setAttribute('data-target', '#modal' + a);
		var h4 = document.createElement('h4');
		h4.setAttribute('class', 'text-left');
		h4.appendChild(document.createTextNode(list.get(a).parish_name));
		a1.appendChild(h4);
		div3.appendChild(a1);

		var p = document.createElement('p');
		p.setAttribute('class', 'text-left');
		p.appendChild(document.createTextNode(list.get(a).parish_caption));
		div3.appendChild(p);

		var p2 = document.createElement('p');
		p2.setAttribute('class', 'text-left');
		p2.appendChild(document.createTextNode(list.get(a).parish_address));
		div3.appendChild(p2);

		var a2 = document.createElement('a');
		a2.href = 'google.com';
		a2.setAttribute('class', 'ca-more');
		a2.appendChild(document.createTextNode('More...'));
		div3.appendChild(a2);

		div2.appendChild(div3);
		div1.appendChild(div2);

		return div1;
	};

	var createModal = function(url, a)
	{
		var div1 = document.createElement('div');
		div1.setAttribute('class', 'modal fade');
		div1.setAttribute('id', 'modal'+a);
		div1.setAttribute('tabindex', '-1');
		div1.setAttribute('role', 'dialog');
		div1.setAttribute('aria-labelledby', 'myModalLabel');
		div1.setAttribute('aria-hidden', 'true');

		var div2 = document.createElement('div');
		div2.setAttribute('class', 'modal-dialog');

		var div3 = document.createElement('div');
		div3.setAttribute('class', 'modal-content');

		var div4 = document.createElement('div');
		div4.setAttribute('class', 'modal-header');	
		var button1 = document.createElement('button');
		button1.setAttribute('type', 'button');
		button1.setAttribute('class', 'close');
		button1.setAttribute('data-dismiss', 'modal');
		button1.setAttribute('aria-hidden', 'true');
		button1.appendChild(document.createTextNode('x'));
		div4.appendChild(button1);
		var h4 = document.createElement('h4');
		h4.setAttribute('class', 'modal-title');
		h4.setAttribute('id', 'myModalLabel');
		h4.appendChild(document.createTextNode(list.get(a).parish_name));
		div4.appendChild(h4);

		var div5 = document.createElement('div');
		div5.setAttribute('class', 'modal-body');
		var div6 = document.createElement('div');
		div6.setAttribute('class', 'form-group');
		div6.setAttribute('style', 'word-wrap:break-word;');
		var div7 = document.createElement('div');
		div7.setAttribute('style', "background-:" + url + "/html_attrib/parishStyles/images/pic3.jpg);");
		var p1 = document.createElement('p');
		p1.setAttribute('class', 'text-center');
		p1.appendChild(document.createTextNode(list.get(a).parish_shortDescription));
		var a = document.createElement('a');
		a.href = 'google.com';
		a.setAttribute('class', 'ca-more');
		a.appendChild(document.createTextNode('More...'));
		div6.appendChild(div7);
		div6.appendChild(p1);
		div6.appendChild(a);
		var div8 = document.createElement('div');
		div8.setAttribute('class', 'form-group');
		div5.appendChild(div6);
		div5.appendChild(div8);

		var div9 = document.createElement('div');
		div9.setAttribute('class', 'modal-footer');

		div3.appendChild(div4);
		div3.appendChild(div5);
		div3.appendChild(div9);
		div2.appendChild(div3);
		div1.appendChild(div2);

		return div1;
	};

	this.displayList = function(url)
	{
		var parish_display = document.getElementById('parish_display');
		parish_display.innerHTML = "";

		var flag = 0;
		console.log(this.pageNum);
		console.log(this.maxPages);
		console.log(this.pageNum * (this.maxPages-1));
		console.log(list.getSize());
		for(var a = this.pageNum * (this.max); a < list.getSize(); a++, flag++)
		{
			if(flag > 0 && flag % (this.max) == 0) break;
			if(flag == 0)
			{
				parish_display.appendChild(createParishElement(url, a));
			}
			else
			{
				var block_div = document.createElement('div');
				block_div.setAttribute('class', 'block-3');
				block_div.appendChild(createParishElement(url, a));

				parish_display.appendChild(block_div);
			}
			
			parish_display.appendChild(createModal(url, a));
		}
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
	
	this.views["thumbnails"] = "index.php/parish_site/thumbnails";
	this.views["list"] 		 = "index.php/parish_site/lists";

	this.init = function()
	{
		document.getElementById("init").innerHTML = '<meta name ="viewport" content = "width=device-width, initial-scale = 1.0">'+
		'<link href = "'+ base_url +'html_attrib/parishStyles/css/bootstrap_2.css" rel = "stylesheet">'+
		'<link href = "'+ base_url +'html_attrib/parishStyles/css/styles.css" rel = "stylesheet">'+
		'<link rel="stylesheet" type="text/css" href="'+ base_url +'html_attrib/parishStyles/css/parishStyle.css" media="screen"></style>';
	};

	var closure = function(ref, key)
	{
		return function()
		{
			document.getElementById("myframe").src = base_url + ref.views[key];		
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
	var base_url = $("#init").data('base_url');
	this.months = {};

	this.months["January 2014"] = "index.php/parish_site/months/january";
	this.months["February 2014"] = "index.php/parish_site/months/febuary";
	this.months["March 2014"] = "index.php/parish_site/months/march";
	this.months["April 2014"] = "index.php/parish_site/months/april";
	this.months["May 2014"] = "index.php/parish_site/months/may";
	this.months["June 2014"] = "index.php/parish_site/months/june";
	this.months["July 2014"] = "index.php/parish_site/months/july";
	this.months["August 2014"] = "index.php/parish_site/months/august";
	this.months["September 2014"] = "index.php/parish_site/months/september";
	this.months["October 2014"] = "index.php/parish_site/months/october";
	this.months["November 2014"] = "index.php/parish_site/months/november";
	this.months["December 2014"] = "index.php/parish_site/months/december";

	this.init = function()
	{	
		document.getElementById("init").innerHTML = '<meta name ="viewport" content = "width=device-width, initial-scale = 1.0">'+
		'<link href = "'+ base_url +'html_attrib/parishStyles/css/bootstrap_2.css" rel = "stylesheet">'+
		'<link href = "'+ base_url +'html_attrib/parishStyles/css/styles.css" rel = "stylesheet">'+
		'<link rel="stylesheet" type="text/css" href="'+ base_url +'html_attrib/parishStyles/css/newStyle.css" media="screen"></style>';
	};

	var closure = function(ref, key)
	{
		return function()
		{
			document.getElementById("myframe").src = base_url + ref.months[key];		
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
	this.urls["Reading of the Day"] = "index.php/parish_site/sched/read";
	this.urls["Mass Schedule"] = "index.php/parish_site/sched/mass";
	this.urls["Baptism"] = "index.php/parish_site/sched/bapt";
	this.urls["Confession"] = "index.php/parish_site/sched/confess";
	this.urls["Confirmation"] = "index.php/parish_site/sched/confirm";

	this.init = function()
	{
		document.getElementById("init").innerHTML = '<meta name ="viewport" content = "width=device-width, initial-scale = 1.0">'+
		'<link href = "'+ base_url +'html_attrib/parishStyles/css/bootstrap_2.css" rel = "stylesheet">' +
		'<link href = "'+base_url+'html_attrib/parishStyles/css/bootstrap.css" rel = "stylesheet">' +
		'<link href = "'+ base_url +'html_attrib/parishStyles/css/styles.css" rel = "stylesheet">'+
		'<link href = "'+ base_url +'html_attrib/parishStyles/css/newStyle.css" rel = "stylesheet">'+
		'</style><link rel="stylesheet" type="text/css" href="'+ base_url +'html_attrib/parishStyles/css/parishStyle.css" media="screen"></style>';
	};
	
	var closure = function(ref, key)
	{
		return function()
		{
			document.getElementById("myframe").src = base_url + ref.urls[key];		
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
	this.init = function()
	{
		var base_url = $("#init").data('base_url');
		document.getElementById("init").innerHTML = '<meta name ="viewport" content = "width=device-width, initial-scale = 1.0"><link href = "'+ base_url +'html_attrib/parishStyles/services/servbootstrap.css" rel = "stylesheet"><link href = "'+ base_url +'html_attrib/parishStyles/css/styles.css" rel = "stylesheet"><link rel="stylesheet" type="text/css" href="'+ base_url +'html_attrib/parishStyles/css/parishStyle.css" media="screen"></style>';
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

	this.schedules["0"] = "Any";
    this.schedules["00:15"] = "12:15AM";
    this.schedules["00:30"] = "12:30AM";
    this.schedules["00:45"] = "12:45AM";
    this.schedules["01:00"] = "01:00AM";
    this.schedules["01:15"] = "01:15AM";
    this.schedules["01:30"] = "01:30AM";
    this.schedules["01:45"] = "01:45AM";
    this.schedules["02:00"] = "02:00AM";
    this.schedules["02:15"] = "02:15AM";
    this.schedules["02:30"] = "02:30AM";
    this.schedules["02:45"] = "02:45AM";
    this.schedules["03:00"] = "03:00AM";
    this.schedules["03:15"] = "03:30AM";
    this.schedules["03:30"] = "03:30AM";
    this.schedules["03:45"] = "03:30AM";
    this.schedules["04:00"] = "04:30AM";
    this.schedules["04:15"] = "04:30AM";
    this.schedules["04:30"] = "04:30AM";
    this.schedules["04:45"] = "04:30AM";
    this.schedules["05:00"] = "05:30AM";
    this.schedules["05:15"] = "05:30AM";
    this.schedules["05:30"] = "05:30AM";
    this.schedules["05:45"] = "05:30AM";
    this.schedules["06:00"] = "06:30AM";
    this.schedules["06:15"] = "06:30AM";
    this.schedules["06:30"] = "06:30AM";
    this.schedules["06:45"] = "06:30AM";
    this.schedules["07:00"] = "07:30AM";
    this.schedules["07:15"] = "07:30AM";
    this.schedules["07:30"] = "07:30AM";
    this.schedules["07:45"] = "07:30AM";
    this.schedules["08:00"] = "08:30AM";
    this.schedules["08:15"] = "08:30AM";
    this.schedules["08:30"] = "08:30AM";
    this.schedules["08:45"] = "08:30AM";
    this.schedules["09:00"] = "09:30AM";
    this.schedules["09:15"] = "09:30AM";
    this.schedules["09:30"] = "09:30AM";
    this.schedules["09:45"] = "09:30AM";
    this.schedules["10:00"] = "10:30AM";
    this.schedules["10:15"] = "10:30AM";
    this.schedules["10:30"] = "10:30AM";
    this.schedules["10:45"] = "10:30AM";
    this.schedules["11:00"] = "11:30AM";
    this.schedules["11:15"] = "11:30AM";
    this.schedules["11:30"] = "11:30AM";
    this.schedules["11:45"] = "11:30AM";
    this.schedules["12:00"] = "12:30AM";
    this.schedules["12:15"] = "12:30AM";
    this.schedules["12:30"] = "12:30AM";
    this.schedules["12:45"] = "12:30AM";
    this.schedules["13:00"] = "12:30AM";
    this.schedules["13:15"] = "12:30AM";
    this.schedules["13:30"] = "12:30AM";
    this.schedules["13:45"] = "12:30AM";
    this.schedules["14:00"] = "12:30AM";
    this.schedules["14:15"] = "12:30AM";
    this.schedules["14:30"] = "12:30AM";
    this.schedules["14:45"] = "12:30AM";
    this.schedules["15:00"] = "12:30AM";
    this.schedules["15:15"] = "12:30AM";
    this.schedules["15:30"] = "12:30AM";
    this.schedules["15:45"] = "12:30AM";
    this.schedules["16:00"] = "12:30AM";
    this.schedules["16:15"] = "12:30AM";
    this.schedules["16:30"] = "12:30AM";
    this.schedules["16:45"] = "12:30AM";
    this.schedules["17:00"] = "12:30AM";
    this.schedules["17:15"] = "12:30AM";
    this.schedules["17:30"] = "12:30AM";
    this.schedules["17:45"] = "12:30AM";
    this.schedules["18:00"] = "12:30AM";
    this.schedules["18:15"] = "12:30AM";
    this.schedules["18:30"] = "12:30AM";
    this.schedules["18:45"] = "12:30AM";
    this.schedules["19:00"] = "12:30AM";
    this.schedules["19:15"] = "12:30AM";
    this.schedules["19:30"] = "12:30AM";
    this.schedules["19:45"] = "12:30AM";
    this.schedules["20:00"] = "12:30AM";
    this.schedules["20:15"] = "12:30AM";
    this.schedules["20:30"] = "12:30AM";
    this.schedules["20:45"] = "12:30AM";
    this.schedules["21:00"] = "12:30AM";
    this.schedules["21:15"] = "12:30AM";
    this.schedules["21:30"] = "12:30AM";
    this.schedules["21:45"] = "12:30AM";
    this.schedules["22:00"] = "12:30AM";
    this.schedules["22:15"] = "12:30AM";
    this.schedules["22:30"] = "12:30AM";
    this.schedules["22:45"] = "12:30AM";
    this.schedules["23:00"] = "12:30AM";
    this.schedules["23:15"] = "12:30AM";
    this.schedules["23:30"] = "12:30AM";
    this.schedules["23:45"] = "12:30AM";
    this.schedules["24:00"] = "12:30AM";	

	this.days["0"] = "Any";
    this.days["1"] = "Sunday";
    this.days["2"] = "Monday";
    this.days["3"] = "Tuesday";
    this.days["4"] = "Wednesday";
    this.days["5"] = "Thursday";
    this.days["6"] = "Friday";
    this.days["7"] = "Saturday";

    this.languages["0"] = "Any";
    this.languages["1"] = "English";
    this.languages["2"] = "Cebuano";

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
