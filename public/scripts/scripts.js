$(function() { 

	//Hide new entry on main page.
	$('#addNewEntry').css('display', 'none');
	//Hide descriptions for each item.
	$('div.item').children().not('h4').css('display', 'none');
	//Need to hide the delete and edit buttons as well.
	$('a.sideButts').css('display', 'none');

	//Append on tabs with jquery so that if javascript is disabled it is not visible.
	$('#tabs').append('<li id="newItemTab"><a href="#">New Item</a></li>');

	$('div.item').css('cursor', 'pointer').click(function(e) {
		 if (!$(e.target).is('textarea')) { 
         	$(this).children().not('h4').slideToggle(); 
         	$(this).children().find('a.sideButts').slideToggle();
            $(this).children('h4').toggleClass('expandDown'); 
        }
	});

	//Add New Item button functionality. 
	$('#tabs li').click(function() {
		$('#tabs li').removeClass('selected');
		$(this).addClass('selected');
		if($(this).attr('id') == 'newItemTab') { 
            $('#todo').css('display', 'none'); 
            $('#addNewEntry').css('display', 'block');           
        } else { 
            $('#addNewEntry').css('display', 'none'); 
            $('#todo').css('display', 'block'); 
        } 
        return false;
	});



    // Delete anchor tag clicked 
    $('a.deleteEntryAnchor').click(function() { 
        var thisparam = $(this); 
        thisparam.parent().parent().parent().find('p').text('Please Wait...'); 
        $.ajax({ 
            type: 'GET', 
            url: thisparam.attr('href'), 
              
            success: function(results){ 
                thisparam.parent().parent().parent().fadeOut('slow'); 
            } 
        }) 
        return false; 
    }); 
      
	// Edit an item asynchronously 
	      
	$('.editEntry').click(function() { 
	    var $this = $(this); 
	    var oldText = $this.parent().parent().parent().find('#desc').text(); 
	    var id = $this.parent().parent().parent().find('#id').val(); 
	    console.log('id: ' + id); 
	    $this.parent().parent().parent().find('#desc').empty().append('<textarea class="newDescription" cols="33">' + oldText + '</textarea>'); 
	    $('.newDescription').blur(function() { 
	        var newText = $(this).val(); 
	        $.ajax({ 
	            type: 'POST', 
	            url: 'updateEntry.php', 
	            data: 'description=' + newText + '&id=' + id, 
	              
	            success: function(results) { 
	                $this.parent().parent().parent().find('#desc').empty().append(newText); 
	            } 
	        }); 
	    }); 
	    return false; 
	}); 
  
});