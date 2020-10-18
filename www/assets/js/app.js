
$(function(){
  $('.delete').click(function(){
    if (!confirm('Etes-vous sûr de vouloir supprimer ce post ?')){
      return false;
    }
  });

  $('.edit').submit(function(){
    if (!confirm('Etes-vous sûr de vouloir modifier ce post ?')){
      return false;
    }
  });

});
