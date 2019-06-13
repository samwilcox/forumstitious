var currentDialogElement = '';

window.onscroll = function() {TopBarScroll()};

function TopBarScroll()
{
	var threshold = ($("#id-navtree").offset().top + $("#id-navtree").height());
	
	if (document.body.scrollTop > threshold || document.documentElement.scrollTop > threshold)
	{
		$("#id-topbar-static").css({"top":"0px"});
	}
	else
	{
		$("#id-topbar-static").css({"top":"-100px"});
	}
}

function ToggleIsland(el)
{
	var collapseArrow = $(el).data('collapse');
	var expandArrow   = $(el).data('expand');
	
	if ($("#id-island-right").is(":visible"))
	{
		$("#id-island-right").fadeOut();
		$("#id-island-toggler").attr('class', 'fa ' + expandArrow);
	}
	else
	{
		$("#id-island-right").fadeIn();
		$("#id-island-toggler").attr('class', 'fa ' + collapseArrow);
	}
}

function ToggleMobileMenu()
{
	if ($("#id-popout-menu").is(":visible"))
	{
		$("#id-popout-menu").hide('slide', {direction: 'right'}, 500);
		$("#id-background-disabler").fadeOut();
	}
	else
	{
		$("#id-popout-menu").show('slide', {direction: 'right'}, 500);
		$("#id-background-disabler").fadeIn();
	}
}

function Toggler(el)
{
	var content  = $(el).data('content');
	var icon     = $(el).data('icon');
	var header   = $(el).data('header');
	var collapse = $(el).data('collapse');
	var expand   = $(el).data('expand');
	
	if ($("#" + content).is(":visible"))
	{
		$("#" + content).slideUp(function() {
			$("#" + header).css({"border-bottom-left-radius":"3px", "border-bottom-right-radius":"3px", "opacity":"0.4", "margin-bottom":"12px"});
		});
		$("#" + icon).attr('class', 'fa ' + expand);
	}
	else
	{
		$("#" + header).css({"margin-bottom":"0px"});
		$("#" + content).slideDown(function() {
			$("#" + header).css({"border-bottom-left-radius":"0px", "border-bottom-right-radius":"0px", "opacity":"1.0"});
		});
		$("#" + icon).attr('class', 'fa ' + collapse);
	}
}

function OpenDialog(el)
{
	var dialog      = $(el).data('dialog');
	var dialogWidth = $(el).data('width');
	
	$("#" + dialog).css({"width":dialogWidth + "px"});
	
	if (currentDialogElement != '')
	{
		$("#" + currentDialogElement).fadeOut();
		$("#id-background-disabler").fadeOut();
		currentDialogElement = '';
	}
	
	$("#" + dialog).css({"width":dialogWidth + "px", "margin-top":'-' + ($("#" + dialog).height() / 2 ) + "px", "margin-left":'-' + ($("#" + dialog).width() / 2) + "px"});
	$("#id-background-disabler").fadeIn();
	$("#" + dialog).fadeIn();
	currentDialogElement = dialog;
}

function CloseDialog()
{
	if (currentDialogElement != '')
	{
		$("#" + currentDialogElement).fadeOut();
		$("#id-background-disabler").fadeOut();
		currentDialogElement = '';
	} 
}