var url = current_domain+'/comment.php?part=information&id='+infoid;var url2 = current_domain+'/javascript.php?part=information&id='+infoid;$.get(url,function(data){$('#ajaxcomment').html(data);});$.get(url2,function(data){$('#hit').html(data);});