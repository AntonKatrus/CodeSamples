<!--
Pressing key 
it may be odd or even
it be on central part
partial letter(e.g. first keypress for "o" letter) may be deleted
alt-key makes letter "diagonal"(alt may precede or may follow letter)
shift-key do second "meaning" of button
space-key after partial letter makes it diagonal and also space
do not allow to type using qwerty
keys of type 3 generate second half of symbol and itself 
--------------
/*
button
symbol
keydown?
sector -- set of keys on the keyboard 0(left colored buttons),1,2,3
*/
 -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Гибридная позитивная клавиатура</title>
<!--<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>-->
<script type="text/javascript" src="jquery-latest.min.js"></script>
<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
<script src="jquery-ui.js"></script>
     <!--<link rel="stylesheet" type="text/css" href="http://bgrins.github.com/spectrum/spectrum.css">-->
     <link rel="stylesheet" type="text/css" href="spectrum.css">
      <!--<script type="text/javascript" src="http://bgrins.github.com/spectrum/spectrum.js"></script>-->
      <script type="text/javascript" src="spectrum.js"></script>
<?php
require('base_header.php');
?>
<script type="text/javascript">
window.mobileCheck = function() {
  let check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};
<?php
readfile('data.js');
?>
function printTextArea() {
        childWindow = window.open('','childWindow','location=yes, menubar=yes, toolbar=yes');
        childWindow.document.open();
        childWindow.document.write('<html><head></head><body>');
        childWindow.document.write(document.getElementById('txt').value.replace(/\n/gi,'<br>'));
        childWindow.document.write('</body></html>');
        childWindow.print();
        childWindow.document.close();
        childWindow.close();
		return false;
      }
//window.onbeforeprint = printTextArea;
function save_text_to_downloaded_file()
{
	download_file(); 
	date_object=new Date();
	time_last_saved=date_object.getTime();
	text_last_saved=$('#txt').val();
    $('#txt').focus();
}
//time_last_saved measured in milliseconds sinse 1970
var time_last_saved=0;
//freq_autosave in milliseconds
var freq_autosave=1800000;
var text_last_saved='';
function refresh_search_link()
{
	if($('#txt').val().length>=1)
	$('.googlego').css('visibility','visible');
	//$('#googlego').click(function(){
			$('.googlego').attr('href','https://www.google.com/search?tbm=isch&q='+$('#txt').val());
			//$('#googlego').attr('title','РЅР°Р№С‚Рё '+$('#txt').val());
			//});
	}

function periodically_autosave()
{
	date_object=new Date();
    milliseconds_sinse_1970=date_object.getTime();
	//1800000 -- milliseconds equals to 5 minutes	
	if((milliseconds_sinse_1970-time_last_saved>freq_autosave)&&($('#txt').val()!=text_last_saved))
	save_text_to_downloaded_file();
	setTimeout('periodically_autosave()',freq_autosave);
}
function choose_next_language()
{
	    //cur_lang=$( "#cur_lang" ).html().toLowerCase();
		//eval('arr_letters=arr_letters_'+cur_lang.toLowerCase()+'_input;');
		if(cur_lang==languages.length-1)
		cur_lang=0;
		else
		cur_lang++;
		
		if(cur_lang==1)
		$("#help_link").attr('href','http://geniusideas.com.ua/2020/05/16/hibro-positive-keyboard/');
		else
		$("#help_link").attr('href','http://geniusideas.com.ua/2021/11/19/%D0%B3%D0%B8%D0%B1%D1%80%D0%B8%D0%B4%D0%BD%D0%B0%D1%8F-%D0%BF%D0%BE%D0%B7%D0%B8%D1%82%D0%B8%D0%B2%D0%BD%D0%B0%D1%8F-%D0%BA%D0%BB%D0%B0%D0%B2%D0%B8%D0%B0%D1%82%D1%83%D1%80%D0%B0/');
			
		
		eval('arr_letters=arr_letters_'+languages[cur_lang].toLowerCase()+'_input;');
		$( "#cur_lang" ).html(languages[cur_lang]);
		$( "#cur_lang_extra" ).html(languages[cur_lang]);
		
}
//this function made to prevent cody copying when inserting punctuation letters
function insertAtCursorSymbolAnalyse(symbol)
{
          insertAtCursor(document.getElementById('txt'),symbol);
		  text_field_focus_to_caret();
}
//insert one of clipboards by the begining letters of its
function insert_from_clipboard(f_key,s_key)
{

	if((letter=arr_letters[f_key+''+s_key])||(letter=arr_letters[s_key+''+f_key]))
  {
	for(i_clipboard=0;i_clipboard<clipboards_content.length;i_clipboard++)
	if ((clipboards_content[i_clipboard])&&(clipboards_content[i_clipboard].charAt(0).toLowerCase()==letter))
    {insertAtCursorSymbolAnalyse(clipboards_content[i_clipboard]);paintQuadrantsDefault();return;}
  }
}
function getNineCodeFromKeyCode(keyCode)
{

	if( (keyCode==81)||(keyCode==73) )
    return 7;
	else if( (keyCode==87)||(keyCode==69)||(keyCode==79)||(keyCode==80) )
	return 8;
	else if( (keyCode==82)||(keyCode==219) )
	return 9;
	else if( (keyCode==65)||(keyCode==75) )
	return 4;
	else if( (keyCode==68)||(keyCode==83)||(keyCode==76)||(keyCode==186) )
	return 5;
	else if( (keyCode==70)||(keyCode==222) )
	return 6;
	else if( (keyCode==90)||(keyCode==188) )
	return 1;
	else if( (keyCode==88)||(keyCode==190) )
	return 2;
	else if( (keyCode==67)||(keyCode==191) )
	return 3;
	else return false;
	
}
<?php
readfile('data.js');
?>
var capsLock=0;
var clipboards_content=new Array(10);
function handle_selection_and_internal_clipdoards(keyboard_event)
{
	if((keyboard_event.keyCode>=48)&&(keyboard_event.keyCode<=57))
		{
			  
			  /*Ctrl+digit sets clipboard content, e.g. Ctrl+0 sets first(ordinal 0) clipboard element
			  */
			  if(keyboard_event.ctrlKey)
			  {
				   num_to_insert=parseInt(keyboard_event.keyCode)-48;
				   clipboards_content[num_to_insert]=window.getSelection().toString();
				   //selected text is deleted automatically. so lets restore it
				   insertAtCursorSymbolAnalyse(clipboards_content[num_to_insert]);
				   fill_span_with_clipboard_container();
			  }
			  /*Ctrl+digit gets clipboard content, e.g. Ctrl+0 gets first(ordinal 0) clipboard element
			  */
			  if(keyboard_event.altKey)
			  {
				   num_to_insert=parseInt(keyboard_event.keyCode)-48;
				   if(clipboards_content[num_to_insert])
				   insertAtCursorSymbolAnalyse(clipboards_content[num_to_insert]);
			  }
		}
		  
}
function fill_span_with_clipboard_container()
{
  clipboard_content='';	
  for(clipboard_counter=0;clipboard_counter<clipboards_content.length;clipboard_counter++)
  {
	  if(clipboards_content[clipboard_counter])
	  clipboard_content=clipboard_content+' <strong>'+clipboard_counter.toString()+'</strong>: '+clipboards_content[clipboard_counter].toString()+';';
  }
  $('#clipboard_contains').html(clipboard_content);
}
//currentCaretPos -- indicates last position of caret in textareat:-) 
//var currentCaretPos=0;
function insertAtCursor(myField, myValue) {
    //IE support
    if (document.selection) {
        myField.focus();
        sel = document.selection.createRange();
        sel.text = myValue;
    }
    //MOZILLA and others
    else if (myField.selectionStart || myField.selectionStart == '0') {
		//alert('');
        var startPos = myField.selectionStart;
        var endPos = myField.selectionEnd;
        myField.value = myField.value.substring(0, startPos)
            + myValue
            + myField.value.substring(endPos, myField.value.length);
    //alert(last_keyboard_letter_code_being_typed);
	//if(previous_key_pressed==13)
	countLettersMoveCursorRight=myValue.length;
	//else
	//countLettersMoveCursorRight=myValue.length;
	 myField.setSelectionRange(startPos+countLettersMoveCursorRight,startPos+countLettersMoveCursorRight);
	} else {
        myField.value += myValue;
    }
	//currentCaretPos=startPos+1;
	//new letter begins with hollow second part
	previous_key_pressed=0;
}
function paintQuadrantsDefault()
{
  $('td').css('background',one_of_nine_button_bg);
}
function write_letter(f_key,s_key)
{
	if(f_key==0) return;
  if((letter=arr_letters[f_key+''+s_key])||(letter=arr_letters[s_key+''+f_key]))
  {
	if(capsLock)letter=letter.toUpperCase();
	insertAtCursor(document.getElementById('txt'),letter);
  }
  paintQuadrantsDefault();
  refresh_search_link();
}

 
function download_file() {
  var element = document.createElement('a');
  element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent($('#txt').val()));
  element.setAttribute('download', 'positiveParallelInput.htm');

  element.style.display = 'none';
  document.body.appendChild(element);

  element.click();

  document.body.removeChild(element);
}

function play_common_key_sound(eventKeyUp)
{
	audio_beep.pause();
	
    //big letters should sound louder
	var sound_volume=0.2;
	var letter_sector=0;
	
	if((get_sector_of_press_by_key(eventKeyUp.keyCode)==2)||(get_sector_of_press_by_key(eventKeyUp.keyCode)==1))
	letter_sector=1;
	var top_letter_row_symbol=0;
	
	if((eventKeyUp.keyCode>=48)&&(eventKeyUp.keyCode<=57)&&(!eventKeyUp.shiftKey))
	top_letter_row_symbol=1;
	if((top_letter_row_symbol||letter_sector)&&(capsLock))  
	sound_volume=1;

	audio_beep.volume=sound_volume;
	
	audio_beep.currentTime=0;
	audio_beep.src='sounds/10.mp3';
	audio_beep.play();
}
//blur and then focus is made to keep cursor always visible in textarea
function text_field_focus_to_caret()
{
		$('#txt').blur();
        $('#txt').focus();
}
function paint_sectors_by_keyCode(pressKeyCode)
{
					if(get_sector_of_press_by_key(pressKeyCode)==2)
					$('#right_square .btn'+getNineCodeFromKeyCode(pressKeyCode)).css('background',colors_buttons[getNineCodeFromKeyCode(pressKeyCode)-1]);
					else if(get_sector_of_press_by_key(pressKeyCode)==1)
				$('#left_square .btn'+getNineCodeFromKeyCode(pressKeyCode)).css('background',colors_buttons[getNineCodeFromKeyCode(pressKeyCode)-1]);
}
function get_sector_of_press_by_key(key_code)
{
	//left coloured sector
if((key_code==81)||(key_code==87)||(key_code==69)||(key_code==82)||(key_code==70)||(key_code==67)||(key_code==88)||(key_code==90)||(key_code==65)||(key_code==83)||(key_code==68))
					return 1;
					//right coloured sector
             else if((key_code==73)||(key_code==219)||(key_code==79)||(key_code==80)||(key_code==222)||(key_code==191)||(key_code==190)||(key_code==188)||(key_code==75)||(key_code==186)||(key_code==76))
			 return 2;
			 //punctuational sector
			else if((key_code==220)||(key_code==221)||(key_code==84)||(key_code==89)||(key_code==85)||(key_code==71)||(key_code==72)||(key_code==74)||(key_code==86)||(key_code==66)||(key_code==78)||(key_code==77))
		return 3;
		//del, backspace, left,right,top,down
		else if((key_code==8)||(key_code==38)||(key_code==40)||(key_code==39)||(key_code==37) ||(key_code==46) )
		return 4;
		//1,2,3,4,5,6,7,8,9,0
		else if((key_code>=48)&&(key_code<=57)) return 5;
		else return 4;
}
var audio_beep; 
var previous_key_pressed=0;
var current_key_pressed=0;
//1000 means that default value is not credible 
var previous_sector_of_press=1000;
var current_sector_of_press=1000;
var one_of_nine_button_bg='#eeeeee';
var languages=new Array('UKR','ENG','RUS');
var symbolsTopRow=new Array( new Array('д','т','п','з','н','у','с','л','к','р'),
//new Array('d','and','th','the','h','f','ing','l','r','p')
new Array('AND ','L','in','n','H','S ','t ','th','e ','R')

);

var symbolsCtrl=new Array('\u2601','\u2602','\u2603','\u2604','\u2605','\u2606','\u2607','\u2608','\u2609','\u260A','\u260B','\u260C','\u260D','\u260E','\u260F','\u2610','\u2611','\u2612','\u2613','\u2614','\u2615','\u2616','\u2617','\u2618','\u2619','\u261A','\u261B','\u261C','\u261D','\u261E','\u261F','\u2621','\u2622','\u2623','\u2624','\u2625','\u2626','\u2627','\u2638');
function CopyHTMLToClipboard() {    
/* Get the text field */
  var copyText = document.getElementById("txt");

  /* Select the text field */
  copyText.select(); 
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/
 
  /* Copy the text inside the text field */
  document.execCommand("copy");
  window.getSelection().removeAllRanges();
    }   
var active_btn_background='grey';
//current language
var cur_lang=0;
colors_buttons=new Array('red','#ff00ff','#bd20f7','#ffa707','white','blue','#fef200','green','#6decdb');	
$(document).ready(function(){
	if(mobileCheck())
	  $('body').html('<h1>Only desktop version is available for now</h1>');
	choose_next_language();
	setTimeout('periodically_autosave()',freq_autosave);
	
	$('#printTxt').click(function(){ 
    printTextArea(); 
	});

	$('td').css('background',one_of_nine_button_bg);
	//cur_lang=$( "#lang option:selected" ).val().toLowerCase();
	$('#cur_lang').html(languages[cur_lang]);
	$('#cur_lang_extra').html(languages[cur_lang]);
	$('#txt').focus();
	$("#color_picker").spectrum({
    color: "white",
    change: function(color) {
        $('body').css('background-color',color.toHexString());
		$('#txt').focus();
    },
	move: function(color) {
        $('body').css('background-color',color.toHexString());
    },
});

	audio_beep = new Audio('sounds/beep.mp3');
	$(document).keydown(function(e){
		if(((e.keyCode==18)&&(e.shiftKey))||((e.keyCode==16)&&(e.altKey)))
			choose_next_language();
		
	});
	
		$('#txt').keydown(function(e){
			//search google
			if((e.ctrlKey)&&(e.shiftKey)&&(e.keyCode==39))
			window.location='https://rabota.ua/jobsearch/vacancy_list?regionId=1&keyWords='+$('#txt').val();	
			else if((e.ctrlKey)&&(e.keyCode==38))
			window.location='https://www.google.com/search?tbm=isch&q='+$('#txt').val();
			else if((e.ctrlKey)&&(e.keyCode==39))
			window.location='https://www.google.com/search?q='+$('#txt').val();	
		
			
			if(((e.keyCode==18)&&(e.shiftKey))||((e.keyCode==16)&&(e.altKey)))
			choose_next_language();
				//shift-key should not generate sound
				if( (e.keyCode!=16)&&(e.keyCode!=17)&&(e.keyCode!=18) )
				play_common_key_sound(e);
			
			
			//delete half of the letter 
			if((e.keyCode==8)&&(previous_key_pressed!=0))
			   {previous_key_pressed=0;paintQuadrantsDefault();return false;}
		     //simulation of a click
		     clickBtn(e);
if(!((e.keyCode==8)||(e.keyCode==9)||(e.keyCode==38)||(e.keyCode==40)||(e.keyCode==39)||(e.keyCode==37)||(e.keyCode==46))) 
			   return false;		

						
			});
			$('#save_textbutton').click(function(){
				save_text_to_downloaded_file();
				
			});
		function clickBtn(e){
		
		refresh_search_link();

		handle_selection_and_internal_clipdoards(e);
		paint_sectors_by_keyCode(e.keyCode);	
		
		//when shift is pressed with buttons of 1 or 2 sectors -- it should not be painted	
		if(  ((e.shiftKey)||(e.ctrlKey))&&((get_sector_of_press_by_key(e.keyCode)==1)||get_sector_of_press_by_key(e.keyCode)==2)  )	
		paintQuadrantsDefault();
		//when buffer if full and user has pressed punctuation button -- diagonal element appears
		if( ( (get_sector_of_press_by_key(e.keyCode)==3)||(get_sector_of_press_by_key(e.keyCode)==4)||(get_sector_of_press_by_key(e.keyCode)==5) )&&(previous_key_pressed!=0)/*&&(e.keyCode!=8)*/)
			{
			    previous_num_of_nine_buttons=getNineCodeFromKeyCode(previous_key_pressed);	
				previous_key_pressed=0;
				write_letter(previous_num_of_nine_buttons,previous_num_of_nine_buttons);
			}
//when buffer if full and user has want to type alternative letter(using shift-key) -- diagonal element appears
if( ( (get_sector_of_press_by_key(e.keyCode)==1)||(get_sector_of_press_by_key(e.keyCode)==2) )&&(previous_key_pressed!=0)&&((e.shiftKey)||(e.ctrlKey))/*&&(e.keyCode!=8)*/)
			{
			    previous_num_of_nine_buttons=getNineCodeFromKeyCode(previous_key_pressed);	
				previous_key_pressed=0;
				write_letter(previous_num_of_nine_buttons,previous_num_of_nine_buttons);
			}
		/*
		if((get_sector_of_press_by_key(e.keyCode)==3)&&(previous_key_pressed!=0))	
		{
		        previous_num_of_nine_buttons=getNineCodeFromKeyCode(previous_key_pressed);	
				previous_key_pressed=0;
				write_letter(previous_num_of_nine_buttons,previous_num_of_nine_buttons);
				
		}*/
		//shift-key(code:16) should not be counted as effective symbol-meaning button	
		if (e.keyCode==16){/* test this counter++;*/text_field_focus_to_caret();return;}
		//blur and then focus is made to keep cursor always visible in textarea
		text_field_focus_to_caret();
		//colored keys of the keyboard
		//start: long if statement for different symbols
		if (e.ctrlKey)
		{
			if (e.keyCode==81)
			{ 
    			insertAtCursorSymbolAnalyse(symbolsCtrl[0]);/*set to in order to skip even key-pressing*/ 				return;
			}
		    else if (e.keyCode==73)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[1]);/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==87)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[2]);/*set to in order to skip even key-pressing*/            
				
				return;
			}
		    else if (e.keyCode==69)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[3]);/*set to in order to skip even key-pressing*/            
				
				return;
			}
			else if (e.keyCode==79)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[4]);/*set to in order to skip even key-pressing*/            
				
				return;
			}
			else if (e.keyCode==80)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[5]);/*set to in order to skip even key-pressing*/            
				
				return;
			}
			else if (e.keyCode==82)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[6]);/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==219)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[7]);/*set to in order to skip even key-pressing*/            
				
				return;
			}
			else if (e.keyCode==65)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[8]);/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==75)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[9]);/*set to in order to skip even key-pressing*/            
				return;
			}
			else if (e.keyCode==68)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[10]);/*set to in order to skip even key-pressing*/            
				
				return;
			}
	        else if (e.keyCode==83)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[11]);/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==76)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[12]);/*set to in order to skip even key-pressing*/   return;
			}
			else if (e.keyCode==186)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[13]);/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==70)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[14]);/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==222)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[15]);/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==221)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[16]);/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==90)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[17]);/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==188)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[18]);/*set to in order to skip even key-pressing*/   return;
			}
	        else if (e.keyCode==88)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[19]);/*set to in order to skip even key-pressing*/   return;
			}
			else if (e.keyCode==190)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[20]);/*set to in order to skip even key-pressing*/   return;
			}
			else if (e.keyCode==67)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[21]);/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==191)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[22]);/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==89)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[23]);/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==85)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[24]);/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==71)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[25]);/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==72)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[26]);/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==74)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[27]);/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==86)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[28]);/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==66)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[29]);/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==78)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[30]);/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==77)
			{ 
			    
				insertAtCursorSymbolAnalyse(symbolsCtrl[31]);/*set to in order to skip even key-pressing*/ return;
			}
		}
		else if (e.shiftKey)
		{
			if (e.keyCode==81)
			{ 
    			insertAtCursorSymbolAnalyse('☺');/*set to in order to skip even key-pressing*/ 				return;
			}
		    else if (e.keyCode==73)
			{ 
			    
				insertAtCursorSymbolAnalyse('♥');/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==87)
			{ 
			    
				insertAtCursorSymbolAnalyse('^');/*set to in order to skip even key-pressing*/            
				
				return;
			}
		    else if (e.keyCode==69)
			{ 
			    
				insertAtCursorSymbolAnalyse('~');/*set to in order to skip even key-pressing*/            
				
				return;
			}
			else if (e.keyCode==79)
			{ 
			    
				insertAtCursorSymbolAnalyse('>');/*set to in order to skip even key-pressing*/            
				
				return;
			}
			else if (e.keyCode==80)
			{ 
			    
				insertAtCursorSymbolAnalyse('<');/*set to in order to skip even key-pressing*/            
				
				return;
			}
			else if (e.keyCode==82)
			{ 
			    
				insertAtCursorSymbolAnalyse('|');/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==219)
			{ 
			    
				insertAtCursorSymbolAnalyse('\\');/*set to in order to skip even key-pressing*/            
				
				return;
			}
			else if (e.keyCode==65)
			{ 
			    
				insertAtCursorSymbolAnalyse('№');/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==75)
			{ 
			    
				insertAtCursorSymbolAnalyse('π');/*set to in order to skip even key-pressing*/            
				return;
			}
			else if (e.keyCode==68)
			{ 
			    
				insertAtCursorSymbolAnalyse('♂');/*set to in order to skip even key-pressing*/            
				
				return;
			}
	        else if (e.keyCode==83)
			{ 
			    
				insertAtCursorSymbolAnalyse('♀');/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==76)
			{ 
			    
				insertAtCursorSymbolAnalyse('©');/*set to in order to skip even key-pressing*/   return;
			}
			else if (e.keyCode==186)
			{ 
			    
				insertAtCursorSymbolAnalyse('°');/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==70)
			{ 
			    
				insertAtCursorSymbolAnalyse('÷');/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==222)
			{ 
			    
				insertAtCursorSymbolAnalyse('€');/*set to in order to skip even key-pressing*/ return;
			}
			else if (e.keyCode==221)
			{ 
			    
				insertAtCursorSymbolAnalyse(',');/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==90)
			{ 
			    
				insertAtCursorSymbolAnalyse('∑');/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==188)
			{ 
			    
				insertAtCursorSymbolAnalyse('±');/*set to in order to skip even key-pressing*/   return;
			}
	        else if (e.keyCode==88)
			{ 
			    
				insertAtCursorSymbolAnalyse('[');/*set to in order to skip even key-pressing*/   return;
			}
			else if (e.keyCode==190)
			{ 
			    
				insertAtCursorSymbolAnalyse('×');/*set to in order to skip even key-pressing*/   return;
			}
			else if (e.keyCode==67)
			{ 
			    
				insertAtCursorSymbolAnalyse(']');/*set to in order to skip even key-pressing*/  return;
			}
			else if (e.keyCode==191)
			{ 
			    
				insertAtCursorSymbolAnalyse('♪');/*set to in order to skip even key-pressing*/  return;
			}
		
		}
		
		if(e.keyCode==187)
		  { 
			    
				capsLock=1;text_field_focus_to_caret();return;}
		  
		if(e.keyCode==189)
		  { 
			    
				capsLock=0;text_field_focus_to_caret();return;}
		  
		//tilde button stands for CapsLock
		if(e.keyCode==192)
		  { 
			    
				capsLock=(!capsLock);text_field_focus_to_caret();return;}
		//buttons 1,2,3,4,5,6,7,8,9,0
		if((e.keyCode>=48)&&(e.keyCode<=57)&&(!e.ctrlKey)&&(!e.altKey))
		{
		  if(e.shiftKey)
		  {
			   num_to_insert=parseInt(e.keyCode)-48;
			   insertAtCursorSymbolAnalyse(num_to_insert.toString());
			   text_field_focus_to_caret();return;
		  }
		  //insertAtCursorSymbolAnalyse(parseInt(e.keyCode)-48);
		  if ((cur_lang==0)||(cur_lang==2)) 
		  lang_index=0;
		  else
		  lang_index=1;
		  
		  //symbolsTopRow[lang_index][parseInt(e.keyCode)-48]
		  symbolToAddToText=symbolsTopRow[lang_index][parseInt(e.keyCode)-48];
		  if(capsLock)
		  symbolToAddToText=symbolToAddToText.charAt(0).toUpperCase() + symbolToAddToText.slice(1);
		  insertAtCursorSymbolAnalyse(symbolToAddToText);
		  text_field_focus_to_caret();return;
		}
		//if space was pressed after diagonal letter
		if((e.keyCode==32)&&(previous_key_pressed!=0))
		{
			 current_num_of_nine_buttons=getNineCodeFromKeyCode(previous_key_pressed);
		     previous_num_of_nine_buttons=getNineCodeFromKeyCode(previous_key_pressed);	
			 previous_key_pressed=0;
			 write_letter(current_num_of_nine_buttons,previous_num_of_nine_buttons);
			 insertAtCursorSymbolAnalyse(' ');		
			return;
			
		}
        //insert here code to enable space button
		if(e.keyCode==32)
		{
		 
		  insertAtCursorSymbolAnalyse(' ');
		         
		  return;
		}
		else if(e.keyCode==13)
		{ 
			    
		  previous_key_pressed=e.keyCode;
		  specialAddText='';
		  if($('#useBrTag:checked').length > 0)
		  specialAddText='<br>';
		  insertAtCursorSymbolAnalyse(specialAddText+'\n');
		  
		  //countLettersToMoveCursor=4;
		  return;
		}
		else if(e.keyCode==220)
		{
    	  insertAtCursorSymbolAnalyse('/');
		 return;
		}
		else if(e.keyCode==221)
		{
    	  insertAtCursorSymbolAnalyse(';');
		  return;
		}
		else if(e.keyCode==84)
		{ 
			    
		  if (!e.shiftKey)
		  insertAtCursorSymbolAnalyse(',');
		  else
		  {insertAtCursorSymbolAnalyse('+');/*set to in order to skip even key-pressing*/counter=1;}
		  return;
		  
		}
		else if(e.keyCode==89)
		{ 
			    
		  if (!e.shiftKey)
		  insertAtCursorSymbolAnalyse('.');
		  else	
		  {insertAtCursorSymbolAnalyse('%');/*set to in order to skip even key-pressing*/counter=1;}
		  return;
		}
		else if(e.keyCode==85)
		{ 
			    
		  if (!e.shiftKey)
		  insertAtCursorSymbolAnalyse('-');
		  else
		  {insertAtCursorSymbolAnalyse('*');/*set to in order to skip even key-pressing*/counter=1;}
		  return;
		}
		else if(e.keyCode==71)
		{ 
			    
		  if (!e.shiftKey)
		  insertAtCursorSymbolAnalyse('"');
		  else	
		  {insertAtCursorSymbolAnalyse('=');/*set to in order to skip even key-pressing*/counter=1;}
		  return;
		}
		else if(e.keyCode==72)
		{ 
			    
		  if (!e.shiftKey)	
		  insertAtCursorSymbolAnalyse('?');
		  else	
		  {insertAtCursorSymbolAnalyse('#');/*set to in order to skip even key-pressing*/counter=1;}
		  return;
		}
		else if(e.keyCode==74)
		{ 
			    
		  if (!e.shiftKey)
		  insertAtCursorSymbolAnalyse('!');
		  else	
		  {insertAtCursorSymbolAnalyse('&');/*set to in order to skip even key-pressing*/counter=1;}
		  return;
		}
		else if(e.keyCode==86)
		{ 
			    
		  if (!e.shiftKey)
		  insertAtCursorSymbolAnalyse("'");
		  else	
		  {insertAtCursorSymbolAnalyse('@');/*set to in order to skip even key-pressing*/counter=1;}
		  return;
		}
		else if(e.keyCode==66)
		{ 
			    
		  if (!e.shiftKey)	
		  insertAtCursorSymbolAnalyse('(');
		  else	
		  {insertAtCursorSymbolAnalyse('{');/*set to in order to skip even key-pressing*/counter=1;}
		  return;
		}
		else if(e.keyCode==78)
		{ 
			    
		  if (!e.shiftKey)
		  insertAtCursorSymbolAnalyse(')');
		  else	
		  {insertAtCursorSymbolAnalyse('}');/*set to in order to skip even key-pressing*/counter=1;}
		  return;
		}
		else if(e.keyCode==77)
		{ 
			    
		  if (!e.shiftKey)
		  insertAtCursorSymbolAnalyse(':');
		  else
		  {insertAtCursorSymbolAnalyse(';');/*set to in order to skip even key-pressing*/counter=1;}
		  return;
		}	
        //end: long if statement for different symbols
//buttons: backspace, left, right, up, down button, del  
	         if((e.keyCode==8)||(e.keyCode==38)||(e.keyCode==40)||(e.keyCode==39)||(e.keyCode==37) ||(e.keyCode==46) ){text_field_focus_to_caret();return;}
			   
			 
		//alt pressed after first letter
		/*
		if((e.keyCode==18)&&(previous_key_pressed!=0))
		{
			    current_num_of_nine_buttons=getNineCodeFromKeyCode(previous_key_pressed);
		        previous_num_of_nine_buttons=current_num_of_nine_buttons;	
				previous_key_pressed=0;
				write_letter(current_num_of_nine_buttons,previous_num_of_nine_buttons);
				return;
		}
		
		//alt pressed before first letter
		if((e.keyCode!=0)&&(previous_key_pressed==18))
		{
			    current_num_of_nine_buttons=getNineCodeFromKeyCode(e.keyCode);
		        previous_num_of_nine_buttons=current_num_of_nine_buttons;	
				previous_key_pressed=0;
				write_letter(current_num_of_nine_buttons,previous_num_of_nine_buttons);
				return;

		}*/
		    //start: insert letter by pressing keys
			/*
			 if(previous_key_pressed!=0)  
			{
				current_num_of_nine_buttons=getNineCodeFromKeyCode(e.keyCode);
		        previous_num_of_nine_buttons=getNineCodeFromKeyCode(previous_key_pressed);	
				previous_key_pressed=0;
				//if two keypresses on one sector
				if(get_sector_of_press_by_key(e.keyCode)==previous_sector_of_press)
				{
				write_letter(previous_num_of_nine_buttons,previous_num_of_nine_buttons);
				previous_key_pressed=e.keyCode;
				paint_sectors_by_keyCode(e.keyCode);
				}
				else
				write_letter(current_num_of_nine_buttons,previous_num_of_nine_buttons);
							
		    }
			else		
			    previous_key_pressed=e.keyCode;
			*/
			if((get_sector_of_press_by_key(e.keyCode)==2)&&(previous_key_pressed==0))	
			{
			  	current_num_of_nine_buttons=getNineCodeFromKeyCode(e.keyCode);
				//insert one of clipboards by the begining letters of its content
				if(e.altKey)
				insert_from_clipboard(current_num_of_nine_buttons,current_num_of_nine_buttons);
				else
				write_letter(current_num_of_nine_buttons,current_num_of_nine_buttons);
				
			}
			else if((get_sector_of_press_by_key(e.keyCode)==2)&&(previous_key_pressed!=0))
			{
			    current_num_of_nine_buttons=getNineCodeFromKeyCode(e.keyCode);
				previous_num_of_nine_buttons=getNineCodeFromKeyCode(previous_key_pressed);	
				previous_key_pressed=0;
				
				write_letter(previous_num_of_nine_buttons,current_num_of_nine_buttons);
			}
			else if((get_sector_of_press_by_key(e.keyCode)==1)&&(previous_key_pressed!=0))
			{
			    current_num_of_nine_buttons=getNineCodeFromKeyCode(e.keyCode);
				previous_num_of_nine_buttons=getNineCodeFromKeyCode(previous_key_pressed);	
				previous_key_pressed=0;
				//insert one of clipboards by the begining letters of its content
				if(e.altKey)
				insert_from_clipboard(previous_num_of_nine_buttons,current_num_of_nine_buttons);
				else
				write_letter(previous_num_of_nine_buttons,current_num_of_nine_buttons);
			}
			else if((get_sector_of_press_by_key(e.keyCode)==1)&&(previous_key_pressed==0))
			{
			    previous_key_pressed=e.keyCode;
			}
			
			//end: insert letter by pressing keys	
			previous_sector_of_press=get_sector_of_press_by_key(e.keyCode);
			text_field_focus_to_caret();	
			//end: keyup	
			}
		//copies text to clipboard when colored squares clicked 	
		$('.pxl').click(function(){CopyHTMLToClipboard();})
		$('.pxl').dblclick(function(){$('#sacred_center').css('background-image','url(images/jagannatha.jpg)');})
		$('#cur_lang,#cur_lang_extra').click(function(){
		//cur_lang=$( "#cur_lang" ).html().toLowerCase();
		//eval('arr_letters=arr_letters_'+cur_lang.toLowerCase()+'_input;');
		choose_next_language();
		$('#txt').focus();
			});
	
});


</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style type="text/css">
.pxl{border-collapse:collapse}
td{width:34px !important;height:34px;font-size:30px;text-align:center;vertical-align:middle;border:1px solid grey}
#right_square{display:inline;margin-left:150px}
#left_square{display:inline;}
#txt{width:90%;margin:30px;height:500px;font-size:40px;font-family:Arial;border:1px solid #49ff01;background:transparent url(images/text_bg.png)}
#text_container{text-align:center;width:100%;height:260px;margin-top:-20px}
#hint_desrciption{display:none}
#lang{float:left;font-family:Arial}
#showAndSave{cursor:pointer}
#statistica_values{background:white}
#clipboard_contains{color:#999999;margin-left:30px}
#cur_lang,#cur_lang_extra{cursor:pointer;font-size:20px;font-family:Arial;color:#555555}
#cur_lang_extra{position:fixed;bottom:10px;right:10px}
#useBrTag+label{font-family:Arial;}
#miscs_bar{margin-top:290px}
</style>
  </head>
  <body>
<span id='cur_lang' title='click to change language or Shift+Alt'></span> &nbsp;
<input type='text' id="color_picker"/>&nbsp;<input type="button" id='save_textbutton' value="Save"> &nbsp;&nbsp;<a href='http://geniusideas.com.ua/2021/11/19/%D0%B3%D0%B8%D0%B1%D1%80%D0%B8%D0%B4%D0%BD%D0%B0%D1%8F-%D0%BF%D0%BE%D0%B7%D0%B8%D1%82%D0%B8%D0%B2%D0%BD%D0%B0%D1%8F-%D0%BA%D0%BB%D0%B0%D0%B2%D0%B8%D0%B0%D1%82%D1%83%D1%80%D0%B0/' target='_blank' style="font-weight:bold" target="_blank" title='About this editor' id="help_link">?</a>  
<br clear="all"><br clear="all"><br clear="all">
<?php
require('menu.php');
?>
<?php
readfile('double_form_turbo.htm');
?>
<span id='clipboard_contains'></span>
<span id='cur_lang_extra' title='click to change language or Shift+Alt'></span>
<div id="text_container"><textarea id='txt'></textarea></div>
<div id='miscs_bar'><input type="checkbox" id='useBrTag'><label for="useBrTag">вставлять BR разделитель</label> &nbsp;&nbsp;&nbsp;&nbsp;<input id='printTxt' value='print' type='button'> &nbsp;&nbsp;<a class='googlego' href=''>Google</a>&nbsp;&nbsp;<a target='_blank' href='http://www.geniusideas.com.ua/dream/alphabet.php'>Символы</a>  </div>
  </body>
  
</html>
<?php





