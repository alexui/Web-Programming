var isFirst= false;
var seed = 1;
var isSuccess = 1;

function testFailed(s) {
	console.log(s);
	isSuccess = 0;
}

function random() {
    var x = Math.sin(seed++) * 10000;
    return x - Math.floor(x);
}

function randomString(n) {
	var text = "";
	var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	for( var i=0; i < n; i++ )
		text += possible.charAt(Math.floor(random() * possible.length));

	return text;
}

function checkAll() {
	if($("#cregistered").length == 0)
		testFailed("#cregistered missing");
	if($("#cregistered").text()=="0") {
		isFirst = true;
		console.log("I am the 1st client started");
	} else {
		isFirst = false;
		console.log("I am the 2nd client started");
	}

	var userNameA = randomString(6);
	var userNameB = randomString(6);
	var countryA = randomString(10);
	var countryB = randomString(10);
	var passwordA = randomString(10);
	var passwordB = randomString(10);
	var messages = [];
	for(i=0; i < 2; i++) {
		messages[i] = randomString(100);
	}
	if(isFirst) {
		setTimeout(function(){ testEnterRegister(); }, 100);
		setTimeout(function(){ testRegister(userNameA, passwordA, countryA); }, 1000);
		setTimeout(function(){ testLogIn(userNameA, passwordA); }, 2000);
		setTimeout(function(){ testSendMessage(messages[0]); }, 3000);
		setTimeout(function(){ testSendMessage("/question"); }, 7000);
		setTimeout(function(){ testSendMessage("A"); }, 8000);
		setTimeout(function(){ testSendMessage("/info "+userNameA); }, 9000);
		setTimeout(function(){ checkMessages(messages, userNameA, userNameB, countryA, countryB); }, 10000);
	} else {
		setTimeout(function(){ testEnterRegister(); }, 100);
		setTimeout(function(){ testRegister(userNameB, passwordB, countryB); }, 1000);
		setTimeout(function(){ testLogIn(userNameB, passwordB); }, 2000);
		setTimeout(function(){ testSendMessage(messages[1]); }, 3000);
		setTimeout(function(){ checkMessages(messages, userNameA, userNameB, countryA, countryB); }, 10000);
	}
}

function checkMessages(m, userNameA, userNameB, countryA, countryB) {
	var messages = [];
	var users = [];
	
	users[1] = userNameA;
	users[2] = userNameB;
	users[3] = userNameA;
	users[4] = "System";
	users[5] = "System";
	users[6] = userNameA;
	users[7] = userNameA;
	users[8] = "System";
	
	messages[1] = m[0];
	messages[2] = m[1];
	messages[3] = "/question";
	messages[4] = "One kilobyte is equal to how many bytes?";
	messages[5] = "A 1024 B 1000 C Many D 10";
	messages[6] = "A";
	messages[7] = "/info "+userNameA;
	messages[8] = userNameA+" lives in "+countryA+" and has 1 points";
	
	clearInterval(refreshChat);
	for(var i=1;i<=8;i++) {
		if($("#message_"+i).length == 0)
			testFailed("#message_"+i+" missing");
		if($("#message_"+i+" .message").length == 0)
			testFailed("#message_"+i+" .message missing");
		if($("#message_"+i+" .username").length == 0)
			testFailed("#message_"+i+" .username missing");
		if($("#message_"+i+" .time").length == 0)
			testFailed("#message_"+i+" .time missing");
		if($("#message_"+i+" .username").text() != users[i])
			testFailed("#message_"+i+" .username contains wrong username");
		if($("#message_"+i+" .message").text() != messages[i])
			testFailed("#message_"+i+" .message contains wrong message");
	}
	if(isSuccess)
		console.log("SUCCESS");
}

function testEnterRegister() {
	if($("#register").length == 0)
		testFailed("#register missing");
	$("#register").click();
}

function testRegister(username, password, country) {
	if($("#username").length == 0)
		testFailed("#username missing");
	$("#username").val(username);
	if($("#country").length == 0)
		testFailed("#country missing");
	$("#country").val(country);
	if($("#password").length == 0)
		testFailed("#password missing");
	$("#password").val(password);
	if($("#register").length == 0)
		testFailed("#register missing");
	$("#register").click();
}

function testLogIn(username, password) {
	if($("#username").length == 0)
		testFailed("#username missing");
	$("#username").val(username);
	if($("#password").length == 0)
		testFailed("#password missing");
	$("#password").val(password);
	if($("#loginButton").length == 0)
		testFailed("#loginButton missing");
	$("#loginButton").click();
}

function testSendMessage(message) {
	if($("#message").length == 0)
		testFailed("#message missing");	
	$("#message").val(message);
	if($("#sendMessage").length == 0)
		testFailed("#sendMessage missing");
	$("#sendMessage").click();
}

$(document).ready(new function () {
	setTimeout(function(){ checkAll(); }, 1000);
});
