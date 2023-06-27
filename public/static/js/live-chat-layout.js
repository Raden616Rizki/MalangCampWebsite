// Live Chat Layout

// Mendapatkan token CSRF
let csrfToken = $('meta[name="csrf-token"]').attr('content');
// const chatSound = new Audio("static/audio/chat.mp3");

// Menambahkan token CSRF ke dalam header permintaan
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
});

$(document).ready(function () {

    // Kirim chat dengan Enter
    let chatInput = $('#chat-input');

    chatInput.on('keyup', function (event) {
        // console.log(event);
        if (event.key === 'Enter') {
            if (chatInput.val().trim() !== '') {
                // console.log('send-chat');
                sendChat();
            }
        }
    });

    // Tampilkan chat
    showChat('show');

    // Jalankan fungsi dengan dropdown
    $('.form-select').change(function() {
        let customerId = $('#choose-user .form-select').val();

        // Update isRead
        updateIsRead(customerId);

        $('#maximize-chat a').prop('href', `/live-chat/${customerId}`);
        showChat('show');
    });

    // Polling CheckChat
    setInterval(function() {
        showChat('check');
        updateOption();
    }, 8000);

    // Draggabel chat
    // $('#before-chat').draggable();
    // $('#after-chat').draggable();

    // Update notif chat
    updateOption();

    // Update isRead
    let customerId = $('#choose-user .form-select').val();
    updateIsRead(customerId);
});

function closeChat() {
    $('#after-chat').hide();
    $('#before-chat').show();
}

function openChat() {
    $('#before-chat').hide();
    $('#after-chat').show();
    scrollToBottom();
    // console.log(getCookieValue());
}

function sendChat() {

    let senderId = loginId;
    let receiverId = $('#choose-user .form-select').val();
    let chat = $('#chat-input').val();

    let data = {
        sender_id: senderId,
        receiver_id: receiverId,
        chat: chat,
        file: 'knowhere',
        is_read: 0,
    }

    // console.log(receiverId);
    // return;

    $.ajax({
        type: 'POST',
        url: '/api/live-chat',
        data: data,
        success: function(response) {
            // console.log(response);
            let chat = response['data'];
            document.cookie = "last-chat=" + chat['chat_id'];

            // console.log(document.cookie);

            $('#chat-input').val('');
            $('#send-chat').css('display', 'none');
            addNewChat(data);
            scrollToBottom();
            // chatSound.play();
        }
    });
}

function showChat(dec) {

    let customerId = $('#choose-user .form-select').val();

    $('#maximize-chat a').prop('href', `/live-chat/${customerId}`);

    if (customerId === '1') {
        customerId = loginId;
    }

    let urlGet = '/api/live-chat/' + customerId;

    $.ajax({
        type: 'GET',
        url: urlGet,
        data: {},
        success: function(response) {
            // console.log(response['data'][17]['chat_id']);
            let chats = response['data'];
            let maxLength = chats.length - 1;
            let lastChat = chats[maxLength];

            if (dec == 'check') {
                let chatId = lastChat['chat_id'];
                let cookieChatId = getCookieValue();
                // console.log(chatId + ' : ' + cookieChatId);
                // console.log(chatId == cookieChatId);

                if (chatId != cookieChatId) {
                    document.cookie = "last-chat=" + chatId;
                    addNewChat(lastChat);
                    scrollToBottom();
                    // chatSound.play();
                }

                return;
            }

            $('#content-chat').empty();
            document.cookie = "last-chat=" + lastChat['chat_id'];

            for (let i = 0; i < chats.length; i++) {
                let chat = chats[i];
                addNewChat(chat);
            }

            scrollToBottom();
        }
    });
}

function addNewChat(chat) {

    let senderId = chat['sender_id'];
    let chatText = chat['chat'];
    let receiverProfile = 'static/image/default_profile.png';

    if (loginId !== 1) {
        receiverProfile = 'static/image/AdminLTELogo.png';
    }

    let temp_html = ``;
    // console.log(chatText);

    if (loginId === senderId) {
        temp_html = `
        <table id="sender">
            <tr>
                <td id="chat-sender">
                    ${chatText}
                </td>
                <td>
                    <img src="storage/${ userProfile }" class="img-circle elevation-2" alt="sender-img">
                </td>
            </tr>
        </table>
        <br>
        `;
    } else {
        temp_html = `
        <table id="receiver">
            <tr>
                <td>
                    <img src="${ receiverProfile }" class="img-circle elevation-2" alt="receiver-img">
                </td>
                <td id="chat-receiver">
                    ${chatText}
                </td>
            </tr>
        </table>
        <br>
        `;
    }

    // console.log(temp_html);

    $('#content-chat').append(temp_html);
}

function scrollToBottom() {
    var chat = $('#after-chat');
    var list = $('#content-chat');

    chat.scrollTop(list.height());
}

function checkInputChat() {
    let sendChat = $('#send-chat');
    let chatInput = $('#chat-input');
    if (chatInput.val().trim() !== '') {
        sendChat.css('display', 'block');
    } else {
        sendChat.css('display', 'none');
    }
}

function getCookieValue() {
    var cookies = document.cookie;
    // console.log(cookies);
    var cookie = cookies.split(';');

    for (var i = 0; i < cookie.length; i++) {
        let values = cookie[i].split('=');
        // console.log(values[0]);
        let value = values[1];

        if (values[0].trim() == 'last-chat') {
            // console.log(value);
            return value;
        }
    }
}

function updateNotif(sender_id, text) {
    let urlGet = `/api/live-chat/count/${sender_id}`;

    $.ajax({
        type: 'GET',
        url: urlGet,
        data: {},
        success: function(response) {
            // console.log(response['total']);
            var total = response['total'];
            var chatNotif = $(`#chat-notif-${sender_id}`);
            chatNotif.empty();
            chatNotif.append(`(${total}) ${text}`);
        }
    });
}

function updateIsRead(sender_id) {
    let urlGet = `/api/live-chat/count/${sender_id}`;

    $.ajax({
        type: 'PUT',
        url: urlGet,
        data: {},
        success: function(response) {
            // console.log(response);
            updateOption();
        }
    });
}

function updateOption() {
    $('.form-select option').each(function() {

        var value = $(this).val();
        var text = $(this).filter(function() {
            return $(this).val() == value;
        }).text();

        text = text.split(') ');
        text = text[text.length - 1];
        // console.log(text);
        updateNotif(value, text);
    });
}
