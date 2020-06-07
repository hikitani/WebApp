/*
	Prologue by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	var	$window = $(window),
		$body = $('body'),
		$nav = $('#nav');

	// Breakpoints.
		breakpoints({
			wide:      [ '961px',  '1880px' ],
			normal:    [ '961px',  '1620px' ],
			narrow:    [ '961px',  '1320px' ],
			narrower:  [ '737px',  '960px'  ],
			mobile:    [ null,     '736px'  ]
		});

	// Play initial animations on page load.
		$window.on('load', function() {
			window.setTimeout(function() {
				$body.removeClass('is-preload');
			}, 100);
		});

	// Nav.
		var $nav_a = $nav.find('a');

		$nav_a
			.addClass('scrolly')
			.on('click', function(e) {

				var $this = $(this);

				// External link? Bail.
					if ($this.attr('href').charAt(0) != '#')
						return;

				// Prevent default.
					e.preventDefault();

				// Deactivate all links.
					$nav_a.removeClass('active');

				// Activate link *and* lock it (so Scrollex doesn't try to activate other links as we're scrolling to this one's section).
					$this
						.addClass('active')
						.addClass('active-locked');

			})
			.each(function() {

				var	$this = $(this),
					id = $this.attr('href'),
					$section = $(id);

				// No section for this link? Bail.
					if ($section.length < 1)
						return;

				// Scrollex.
					$section.scrollex({
						mode: 'middle',
						top: '-10vh',
						bottom: '-10vh',
						initialize: function() {

							// Deactivate section.
								$section.addClass('inactive');

						},
						enter: function() {

							// Activate section.
								$section.removeClass('inactive');

							// No locked links? Deactivate all links and activate this section's one.
								if ($nav_a.filter('.active-locked').length == 0) {

									$nav_a.removeClass('active');
									$this.addClass('active');

								}

							// Otherwise, if this section's link is the one that's locked, unlock it.
								else if ($this.hasClass('active-locked'))
									$this.removeClass('active-locked');

						}
					});

			});

	// Scrolly.
		$('.scrolly').scrolly();

	// Header (narrower + mobile).

		// Toggle.
			$(
				'<div id="headerToggle">' +
					'<a href="#header" class="toggle"></a>' +
				'</div>'
			)
				.appendTo($body);

		// Header.
			$('#header')
				.panel({
					delay: 500,
					hideOnClick: true,
					hideOnSwipe: true,
					resetScroll: true,
					resetForms: true,
					side: 'left',
					target: $body,
					visibleClass: 'header-visible'
				});

	var button = document.getElementById('button_add');
	button.onmousedown = function(e){
		let shiftX = e.clientX - button.getBoundingClientRect().left;
		let shiftY = e.clientY - button.getBoundingClientRect().top;

		button.style.position = 'absolute';
		button.style.zIndex = 1000;
		document.body.append(button);
		moveAt(e.pageX,e.pageY);

		function moveAt(pageX,pageY) {
			button.style.left= pageX - shiftX + 'px';
			button.style.top = pageY - shiftY + 'px';
		}

		function onMouseMove (e) {
			moveAt(e.pageX, e.pageY);
		}

		document.addEventListener('mousemove', onMouseMove);

		button.onmouseup = function() {
			document.removeEventListener('mousemove', onMouseMove); 
			button.onmouseup = null;
		};	
	};

	button.ondragstart = function(){
		return false;
	};

});


//                                                        create image
var imgBtn = document.getElementById('image-link');
imgBtn.addEventListener('click', clickImgBtn);
var imgform = document.getElementById("fimg");

function clickImgBtn(){
  imgform.style.display="block";
  //document.body.style.background="black";
};

// a simple check to *try* and ensure valid URIs are used:
function protocolCheck(link) {
	var proto = ['http:', 'https:'];

	for (var i = 0, len = proto.length; i < len; i++) {
			// if the link begins with a valid protocol, return the link
			if (link.indexOf(proto[i]) === 0) {
					return link;
			}
	}

	// otherwise assume it doesn't, prepend a valid protocol, and return that:
	return document.location.protocol + '//' + link;
}

function createImage(e) {
		// stop the default event from happening:
		e.preventDefault();
		var parent = this.parentNode;

		/* checking the protocol (calling the previous function),
			of the URIs provided in the text input elements: */
		src = protocolCheck(document.getElementById('imgURL').value);
		href = protocolCheck('');

		// creating an 'img' element, and an 'a' element
		var img = document.createElement('img'),
				a = document.createElement('a'),
				div = document.createElement('div');

		div.style.position="absolute";

		// setting the src attribute to the (hopefully) valid URI from above
		img.src = src;

		// setting the href attribute to the (hopefully) valid URI from above
		a.href = href;
		// appending the 'img' to the 'a'
		a.appendChild(img);
		div.appendChild(a);
		dragElement(div);
		imgform.style.display="none";

		// inserting the 'a' element *after* the 'form' element
		parent.parentNode.insertBefore(div, parent.nextSibling);
}

var addButton = document.getElementById('imgAdd');

addButton.onclick = createImage;

//                                        create video element
var videoLable = document.getElementById('video-link');	
var vidf = document.getElementById('video_form');
videoLable.addEventListener('click', clickVideoBtn);

function clickVideoBtn(){
	vidf.style.display="block";
};

function create_video(){
	var src = document.getElementById('vidoURL');
	var v = document.getElementById("ifr");
	var b = document.getElementById('vid_btn');
	v.src=src.value;
	src.style.display="none";
	b.style.display="none";
}


//                                        create/delete/rename text lable
var flagTxtLable = false;
var txtLable = document.getElementById('txt-link');

if(flagTxtLable == false){
	txtLable.addEventListener('click', clickQBtn);
	flagTxtLable = true;
};

function clickQBtn(){
	var d = document.createElement('div');
	d.style.position="absolute";
	d.draggable="true";
	var btn=document.createElement('h2');
	var textInBtn = document.createTextNode('Нажмите для изменения текста');
	document.body.appendChild(d);
	btn.appendChild(textInBtn);
	d.appendChild(btn);
	dragElement(d);

	btn.addEventListener('click', renameLable);

	function renameLable(e){
		var form = document.createElement('textarea');
		document.body.appendChild(form);

		form.addEventListener('dblclick', appendTextandDelete);

		function appendTextandDelete(){;
			var text = document.createTextNode(form.value);
			btn.style.color="black";
			btn.removeChild(textInBtn);
			btn.appendChild(text);
			document.body.removeChild(form);
			btn.removeEventListener('click', renameLable);
		}
		
	}
	
	d.addEventListener('dblclick',removeBtn);

	function removeBtn(){
		flagTxtLable = false;
		document.body.removeChild(d);
	};
};
//                                             end text lable



//                                             вопрос с закрытым ответом

var flagCloseQ = false;
var i = 0;

var txtQuestion = document.getElementById('txtqc-link');

if(flagCloseQ == false){
	txtQuestion.addEventListener('click', clickBtn);
	flagCloseQ = true;
};

function clickBtn(){
	var question = document.createElement('textarea');
	var ans1 = document.createElement('input');
	var ans2 = document.createElement('input');
	var ans3 = document.createElement('input');

	document.body.appendChild(question);
	document.body.appendChild(ans1);
	document.body.appendChild(ans2);
	document.body.appendChild(ans3);

	question.addEventListener('dblclick', appendQuestion);
		
	function appendQuestion() {
		var div = document.createElement('div');
		div.className="projects_table";
		div.draggable="true";
		div.style.position="absolute";
		var qForm = document.createElement('h2');
		qForm.appendChild(document.createTextNode(question.value));
		var btn_ans_1 = document.createElement('button');
		var btn_ans_2 = document.createElement('button');
		var btn_ans_3 = document.createElement('button');
		btn_ans_1.appendChild(document.createTextNode(ans1.value));
		btn_ans_2.appendChild(document.createTextNode(ans2.value));
		btn_ans_3.appendChild(document.createTextNode(ans3.value));
		document.body.removeChild(question);
		document.body.removeChild(ans1);
		document.body.removeChild(ans2);
		document.body.removeChild(ans3);
		div.appendChild(qForm);
		div.appendChild(btn_ans_1);
		div.appendChild(btn_ans_2);
		div.appendChild(btn_ans_3);
		document.body.appendChild(div);

		dragElement(div);

		qForm.addEventListener('dblclick',deleteQuestion);

		function deleteQuestion(){
			
			document.body.removeChild(div);
		}
	};

};

//                                            end вопрос с закрытым ответом


//                                             вопрос с открытым ответом

var flagCloseQ = false;
var i = 0;

var txtQuestion = document.getElementById('txtq-link');

if(flagCloseQ == false){
	txtQuestion.addEventListener('click', clickBtn);
	flagCloseQ = true;
};

function clickBtn(){
	var question = document.createElement('textarea');

	document.body.appendChild(question);

	question.addEventListener('dblclick', appendQuestion);
		
	function appendQuestion() {
		var div = document.createElement('div');
		div.className="projects_table";
		div.draggable="true";
		div.style.position="absolute";
		var qForm = document.createElement('h2');
		qForm.appendChild(document.createTextNode(question.value));
		var ans = document.createElement('input');
		document.body.removeChild(question);
		div.appendChild(qForm);
		div.appendChild(ans);
		document.body.appendChild(div);

		dragElement(div);

		qForm.addEventListener('dblclick',deleteQuestion);

		function deleteQuestion(){
			
			document.body.removeChild(div);
		}
	};

};

//                                            end вопрос с открытым


//  save btn
var saveBtn = document.getElementById('saveBtn');
saveBtn.addEventListener('click', clickSave);

function clickSave(){
	var header = document.getElementById('header');
	var mainbox = document.getElementById('mainbox');
	saveBtn.removeEventListener('click', clickSave);
	document.body.removeChild(header);
	document.body.removeChild(mainbox);
};


/* draggable event */

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  elmnt.onmousedown = dragMouseDown;
  

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  };

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  };

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  };
};