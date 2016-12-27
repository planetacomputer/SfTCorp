var manageFriend = function(friendId, action){
	//alert(action + ' ' + friendId);
	var url = action + friendId;
	return $.post(url);
}

$('.add-friend').click(function(){
	var friendId = $(this).data('user-id');
	manageFriend(friendId, '/techcorp/web/techfront/user/add-friend/');
	$(this).addClass('disabled');
});

$('.remove-friend').click(function(){
	var friendId = $(this).data('user-id');
	manageFriend(friendId, '/techcorp/web/techfront/user/remove-friend/');
	$(this).addClass('disabled');
})
