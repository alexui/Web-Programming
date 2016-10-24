
const QUESTION = '/question';
const INFO = '/info';

var answers = ["a", "b", "c", "d", "A", "B", "C", "D"]; 	
var question_list = [];
var question_answered = [];

var current_user;
var users_list = [];
var register_mode = 0;

const LIMIT = 30;

var HTTP = {
    _factories: [
        function() { return new XMLHttpRequest(); },
        function() { return new ActiveXObject("Msxml2.XMLHTTP"); },
        function() { return new ActiveXObject("Microsoft.XMLHTTP"); }
    ],

    _factory: null,
    
    newRequest: function() {
        if (HTTP._factory != null) return HTTP._factory();

        for(var i = 0; i < HTTP._factories.length; i++) {
            try {
                var factory = HTTP._factories[i];
                var request = factory();
                if (request != null) {
                    HTTP._factory = factory;
                    return request;
                }
            }
            catch(e) {
                continue;
            }
        }
        
        HTTP._factory = function() {
            throw new Error("XMLHttpRequest not supported");
        }
        HTTP._factory ();
    }
};


function update_chat_status(no_users_container){
    var url = 'chat_status.php';
    var request = HTTP.newRequest();

    request.open("GET", url);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
        
    request.send(null);

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status == 200){
                var no_users = JSON.parse(request.responseText).no_users;
                no_users_container.innerHTML = no_users;
            }
        }
    }
}

var load_header = function() {
	no_users_container = document.getElementById("cregistered");
	update_chat_status(no_users_container);
}

var load_welcome_form = function() {

	var main = document.getElementById("main");

	var div = document.createElement("div");
	div.setAttribute("id", "welcome_form");
	div.setAttribute("class", "center_text_container");

	var h1 = document.createElement("h1");
    h1.setAttribute("id", "welcome_title");
	h1.innerHTML = "Login to Chat";

	var p_input_username = document.createElement("p");
	var input_username = document.createElement("input");
	input_username.setAttribute("type", "text");
	input_username.setAttribute("id", "username");
	input_username.setAttribute("placeholder", "Username");
	p_input_username.appendChild(input_username);

	var p_input_password = document.createElement("p");
	var input_password = document.createElement("input");
	input_password.setAttribute("type", "password");
	input_password.setAttribute("id", "password");
	input_password.setAttribute("placeholder", "Password");
	p_input_password.appendChild(input_password);

	var p_input_country = document.createElement("p");
	var input_country = document.createElement("input");
	input_country.setAttribute("type", "text");
	input_country.setAttribute("id", "country");
	input_country.setAttribute("placeholder", "Country");
    input_country.style.display = "none";
    p_input_country.appendChild(input_country);

    var p_button_login = document.createElement("p");
    var button_login = document.createElement("button");
    button_login.setAttribute("id", "loginButton");
    button_login.innerHTML = "Log In";
    button_login.onclick = function () {

            error_div.innerHTML = "";
            
            var username = input_username.value;
                var password = input_password.value;

                if (username.length == 0 || password.length == 0)
                    error_div.innerHTML = "Please insert username and password";
                else {
                    login_user_request(username, password, error_div);
                }

            return false;
        };
    p_button_login.appendChild(button_login);

    var p_button_register = document.createElement("p");
    var button_register = document.createElement("button");
    button_register.setAttribute("id", "register");
    button_register.innerHTML = "Register";
    button_register.onclick = function () {

            error_div.innerHTML = "";
            
            if (register_mode) {

                var username = input_username.value;
                var password = input_password.value;
                var country = input_country.value;

                if (username.length == 0 || password.length == 0 || country.length == 0)
                    error_div.innerHTML = "Please insert username, password and country";
                else
                    register_user_request(username, password, country, error_div);
            }
            else {

                h1.innerHTML = "Register to Chat";
                input_country.style.display = "inline";
                button_login.style.display = "none";
                register_mode = 1;
            }

            return false;
        };
    p_button_register.appendChild(button_register);

	var error_div = document.createElement('div');
	error_div.setAttribute("id", "error_div");
	error_div.setAttribute("class", "error_container");

	var form = document.createElement("form");
				
	form.appendChild(p_input_username);
	form.appendChild(p_input_password);
	form.appendChild(p_input_country);
	form.appendChild(p_button_login);
    form.appendChild(p_button_register);

	div.appendChild(h1);
	div.appendChild(form);
	div.appendChild(error_div);

	main.appendChild(div);
}

var load_nav = function() {

	var main = document.getElementById("main");

	var nav = document.createElement("nav");
	nav.setAttribute("id", "left_side_nav");

	var button_div = document.createElement("div");
	button_div.setAttribute("class", "center_text_container");

	var logout_button = document.createElement("button");
	logout_button.setAttribute("id", "logoutButton");
	logout_button.innerHTML = "Log Out";

	logout_button.onclick = function () {
		logout_user_request(current_user);
	}
	
	button_div.appendChild(logout_button);
	nav.appendChild(button_div);

	var contacts_div = document.createElement("div");
	contacts_div.setAttribute("id", "chatUsers");

	nav.appendChild(contacts_div);
	
	main.appendChild(nav);
}

var update_users_window = function (new_contacts_list) {

	var contacts_div = document.getElementById("chatUsers");

	var contact_name;
	var contact_li_div;

	for (var i in users_list) {
		contact_name = users_list[i];
		if (new_contacts_list.indexOf(contact_name) == -1) {
			contact_li_div = document.getElementById("user_" + contact_name);
			contact_li_div.parentNode.removeChild(contact_li_div);
			var pos = users_list.indexOf(contact_name);
			users_list.splice(pos, 1);
		}
	}

	for (var i in new_contacts_list) {
		contact_name = new_contacts_list[i];
		if (users_list.indexOf(contact_name) == -1) {
    		contact_li_div = document.createElement("div");
    		contact_li_div.setAttribute("id", "user_" + contact_name);
    		
    		contact_li_div.innerHTML = contact_name;

    		contacts_div.appendChild(contact_li_div);
    		users_list.push(contact_name);
		}
	}
}

var remove_nav = function() {
	var nav = document.getElementById("left_side_nav");
	nav.parentNode.removeChild(nav);
}

var load_chat_window = function () {

	var main = document.getElementById("main");

	div = document.createElement("div");
	div.setAttribute("id", "chatWindow");
	var h1 = document.createElement("h1");
	h1.innerHTML = "Chat Window";
	div.appendChild(h1);

	var hr_title = document.createElement("hr");
	hr_title.setAttribute("id", "title_hr");
	div.appendChild(hr_title);

	main.appendChild(div);
}

var update_chat_window = function (message_json) {

    var div = document.getElementById("chatWindow");
    div.parentNode.removeChild(div);

    div = document.createElement("div");
    div.setAttribute("id", "chatWindow");
    div.style.display = "block";

    var count = 1;

    for (var i in message_json) {

        var message = message_json[i];

        if (message.question > 0) {
            if (question_answered.indexOf(message.question) == -1) {
                question_answered.push(message.question);
                question_list.push({"id":message.question, "question":message.message});
            }
        }

        var message_container = document.createElement("div");
        message_container.setAttribute("id", "message_" + count);
        count++;

        var username_div = document.createElement("div");
        username_div.setAttribute("class", "username");
        username_div.innerHTML = message.username;
        message_container.appendChild(username_div);

        var time_div = document.createElement("div");
        time_div.setAttribute("class", "time");
        time_div.innerHTML = message.timestamp;
        message_container.appendChild(time_div);

        var message_div = document.createElement("div");
        message_div.setAttribute("class", "message");
        message_div.innerHTML = message.message;
        message_container.appendChild(message_div);

        var hr = document.createElement("hr");
        hr.setAttribute("id", "message_hr");

        div.appendChild(message_container);

        div.appendChild(hr);
    }

    var main = document.getElementById("main");
    main.appendChild(div);
}

var remove_chat_window = function () {
	var div_chat_window = document.getElementById("chatWindow");
	div_chat_window.parentNode.removeChild(div_chat_window);
}

var load_chat_send = function () {

	var main = document.getElementById("main_footer");

	var title_div = document.createElement("div");
	title_div.setAttribute("id", "footer_title_container");
	title_div.innerHTML = "Message";

	var error_div = document.createElement("div");
	error_div.setAttribute("id", "footer_send_error");

	main.appendChild(title_div);
	main.appendChild(error_div);

	var div = document.createElement("div");
	div.setAttribute("id", "chatSend");

	var message_container = document.createElement("div");
	message_container.setAttribute("class", "message_container");

	var textarea = document.createElement("textarea");
	textarea.setAttribute("id", "message");
	textarea.setAttribute("name", "text");
	textarea.focus();
	message_container.appendChild(textarea);

	var send_button_container = document.createElement("div");
	send_button_container.setAttribute("class", "send_button_container");

	var input_submit_send_message = document.createElement("input");
	input_submit_send_message.setAttribute("id", "sendMessage");
	input_submit_send_message.setAttribute("type", "submit");
	input_submit_send_message.setAttribute("value", "Send");
	send_button_container.appendChild(input_submit_send_message);

	var form = document.createElement("form");
	form.setAttribute("id", "form_send");
	form.onsubmit = function () {
		var username = current_user;
		var message = textarea.value;
		var question_id = 0;

		if (question_list.length > 0)
			question_id = question_list[0].id;
		
		if (question_id) {
			error_div.innerHTML = "";
			send_response_request(username,         question_id, message);
			question_list.shift();
            title_div.innerHTML = "Message";
		}
		else {
			var word = message.split(" ")[0];

    		switch (word) {
    			case QUESTION:
    				send_question_request(username, message);
    				break;
    			case INFO:
    				var info_username = message.substring(INFO.length).trim();
    				send_info_request(username, info_username, message);
    				break;
    			default:
    				send_message_request(username, message);
    		}
    	}
		textarea.value = "";
		return false;
	}

	form.appendChild(message_container);
	form.appendChild(send_button_container);

	div.appendChild(form);

	main.appendChild(div);
}

var update_chat_send = function () {

	var question_id = 0;
	var title_div = document.getElementById("footer_title_container");

	if (question_list.length > 0) {
		var question = question_list[0];
		question_id = question.id;
		title_div.innerHTML = question.question;
		title_div.style.color = "green";
	}
	else {
		title_div.innerHTML = "Message";
		title_div.style.color = "black";
	}
}

var remove_chat_send = function () {
	var title_div = document.getElementById("footer_title_container");
	title_div.parentNode.removeChild(title_div);

	var error_div = document.getElementById("footer_send_error");
	error_div.parentNode.removeChild(error_div);

	var div_chat_send = document.getElementById("chatSend");
	div_chat_send.parentNode.removeChild(div_chat_send);
}

var register_user_request = function(username, password, country, error_container) {
	var url = 'register.php';
    var request = HTTP.newRequest();

    request.open("POST", url);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 

    var content = 'jsonData={' +
    	'"username":"' + username + '", ' +
    	'"password":"' + password + '", ' +
    	'"country":"' + country + '"' +
    	'}';

    request.send(content);

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status == 200){
                var response_json = JSON.parse(request.responseText);
                if (!response_json.success)
                	error_container.innerHTML = response_json.message;
                else {
                    register_mode = 0;
                	enable_login_disable_register();
                }
            }
        }
    }
}

var login_user_request = function(username, password, error_container) {
	var url = 'login.php';
    var request = HTTP.newRequest();

    request.open("POST", url);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    var content = 'jsonData={' +
    	'"username":"' + username + '", ' +
    	'"password":"' + password + '"' +
    	'}';

    request.send(content);

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status == 200){
                var response_json = JSON.parse(request.responseText);
                if (!response_json.success)
                	error_container.innerHTML = response_json.message;
                else {
                	disable_welcome_form();
                	current_user = username;
                	
                    enable_nav();
                	enable_chat_window();
                    enable_chat_send();
                	chat_users_request();
                	chat_messages_request();

                	refreshChat = window.setInterval(do_refresh_chat, 1000);
                }
            }
        }
    }
}

var do_refresh_chat = function () {
	chat_messages_request();
	chat_users_request();
	load_header();
}

var logout_user_request = function(username) {
	var url = 'logout.php';
    var request = HTTP.newRequest();

    request.open("POST", url);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 

    var content = 'jsonData={' +
    	'"username":"' + username + '"' +
    	'}';

    request.send(content);

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status == 200){
            	clearInterval(refreshChat);
            	current_user = "";
				users_list = [];
            	disable_nav();
            	disable_chat_window();
            	disable_chat_send();
                enable_welcome_form();
            }
        }
    }
}

var chat_users_request = function () {
	var url = 'get_users.php';
    var request = HTTP.newRequest();

    request.open("GET", url);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
            
    request.send(null);

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status == 200){
                var response_json = JSON.parse(request.responseText);
            	update_users_window(response_json);
            }
        }
    }
}

var chat_messages_request = function () {
	var url = 'get_messages.php';
    var request = HTTP.newRequest();

    request.open("GET", url);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
    request.send(null);

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status == 200){
                var response_json = JSON.parse(request.responseText);
            	update_chat_window(response_json);
            	update_chat_send();
            }
        }
    }
}

var send_message_request = function (username, message) {
	var url = 'send_message.php';
    var request = HTTP.newRequest();

    request.open("POST", url);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 

    var content = 'jsonData={' +
    	'"username":"' + username + '", ' +
    	'"message":"' + message + '"' +
    	'}';

    request.send(content);

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status == 200){
                chat_messages_request();
            }
        }
    }
}

var send_question_request = function (username, message) {
	var url = "send_question.php";
    var request = HTTP.newRequest();

    request.open("POST", url);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 

    var content = 'jsonData={' +
    	'"username":"' + username + '", ' +
    	'"message":"' + message + '"' +
    	'}';

    request.send(content);

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status == 200){
                chat_messages_request();
            }
        }
    }
}

var send_info_request = function (username, info_username, message) {
	var url = "send_info.php";
    var request = HTTP.newRequest();

    request.open("POST", url);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
        
    var content = 'jsonData={' +
    	'"username":"' + username + '", ' +
    	'"info_username":"' + info_username + '", ' +
    	'"message":"' + message + '"' +
    	'}';

    request.send(content);

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status == 200){
                chat_messages_request();
            }
        }
    }
}

var send_response_request = function (username, question_id, message) {
	var url = "send_response.php";
    var request = HTTP.newRequest();

    request.open("POST", url);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
        
    var content = 'jsonData={' +
    	'"username":"' + username + '", ' +
    	'"question_id":"' + question_id + '", ' +
    	'"message":"' + message + '" ' +
    	'}';

    request.send(content);

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            if (request.status == 200){
                chat_messages_request();
            }
        }
    }	    	
}

var enable_login_disable_register = function () {
    var login_button = document.getElementById("loginButton");
    login_button.style.display = "inline";

    var input_country = document.getElementById("country");
    input_country.style.display = "none";
}

var disable_welcome_form = function () {
    var div = document.getElementById("welcome_form");
    div.style.display = "none";
}

var enable_welcome_form = function () {
    var div = document.getElementById("welcome_form");
    div.style.display = "block";
}

var disable_chat_window = function () {
    var main = document.getElementById("chatWindow");
    main.style.display = "none";
}

var enable_chat_window = function () {
    var main = document.getElementById("chatWindow");
    main.style.display = "block";
}

var disable_chat_send = function () {
    var main_footer = document.getElementById("main_footer");
    main_footer.style.display = "none";
} 

var enable_chat_send = function () {
    var main_footer = document.getElementById("main_footer");
    main_footer.style.display = "block";
} 
  
var disable_nav = function () {
    var nav = document.getElementById("left_side_nav");
    nav.style.display = "none";
}

var enable_nav = function () {
    var nav = document.getElementById("left_side_nav");
    nav.style.display = "block";
}  
