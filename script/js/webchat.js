$(document).ready(function(){
	chat.init();
});

var chat = {

	//data holds variables for use in the class:

	data : {
		lastID:0,
		noActivity:0
	},

	//Init binds event listeners and sets up timers:

	init : function() {

		//Using the defaultText jQuery plugin, included at the bottom:
		$('#name').defaultText('Nickname');
		$('#email').defaultText('Email (Gravatars are Enabled');
	
		//converting the #chatLineHolder div into a jScrollPane and saving the plugin's API in chat.data:

		chat.data.jspAPI = $('#chatLineHolder').jScrollPane({
			verticalDragMinHeight: 12,
			verticalDragMaxHeight: 12
		}).data('jsp');

		//Use the working variable to prevent multiple form submissions:

		var working = false;

		//Logging a person in the chat:

		$('#loginForm').submit(function(){
			if(working) return false;
			working = true;

			//Using tzPOST wrapper function (definded in the bottom):

			$.tzPOST('login',$(this).serialize(),function(r){
				working = false;

				if(r.error) {
					chat.displayError(r.error);
				} else 
					chat.login(r.name,r.gravatar);
			});
			return false;
		});

		//Submitting a new chat entry:

		$('#submitForm').submit(function() {

			var text = $('#chatText').val();

			if(text.length == 0) {
				return false;
			}

			if(working) return false;
			working = true;

			//Assigning a temporary ID to the chat:
			var tempID = 't'+Math.round(Math.random()*1000000),
				params = {
					id:tempID,
					author:chat.data.name,
					gravatar:chat.data.gravatar,
					text:text.replace(/</g,'&lt;').replace(/>/g,'&gt;')
				};

				//Using the addChatLine method to add the chat to the screen immediately, without waiting for the AJAX to complete:

				chat.addChatLine($.extend({},params));

				//Using the tzPOST wrapper method to send the chat via a POST AJAX request:

				$.tzPOST('submitChat',$(this).serialize(),function(r) {
					working = false;
					$('#chatText').val('');
					$('div.chat-'+tempID).remove();

					params['id'] = r.insertID;
					chat.addChatLine($.extend({},params));
				});
				return false;
		});

		//Logging the user out:
	}
}