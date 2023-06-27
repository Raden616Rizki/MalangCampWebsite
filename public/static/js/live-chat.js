// Live Chat

// Mendapatkan token CSRF
let csrfToken = $('meta[name="csrf-token"]').attr('content');
// const chatSound = new Audio("http://localhost:8000/static/audio/chat.mp3");

// Menambahkan token CSRF ke dalam header permintaan
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': csrfToken
    }
});

$(document).ready(function () {

    let customerId = $('.user-list.active').attr('user-id');
    changeReceiver(customerId);
    updateIsRead(customerId);

    // Get File
    $('#file-input').change(function() {
        changeInputFile();
        var file = $(this).prop('files')[0];
        var fileName = file['name'];
        var chatInput = $('#chat-input');

        chatInput.val(fileName);
        chatInput.prop('disabled', true);
        checkInputChat(chatInput);
    });

    // Kirim chat dengan Enter
    let chatInput = $('#chat-input');

    chatInput.on('keyup', function (event) {
        // console.log(event);
        if (event.key === 'Enter') {
            if (chatInput.val().trim() !== '') {
                // console.log('send-chat');
                let onclickValue = $('#send-chat').prop('onclick');
                let sendFunction = onclickValue.toString().split(' ')[2];
                let getFunction = sendFunction.split('\n')[1];

                if (getFunction === 'sendChat()') {
                    sendChat();
                } else {
                    let num1 = getFunction.split('(')[1];
                    let num2 = num1.replace(')', '');
                    let chatId = parseInt(num2);

                    editChat(chatId);
                }
            }
        }
    });

    // Tampilkan chat
    showChat('show');

    // Polling CheckChat
    setInterval(function() {
        showChat('check');
        updateOption();
    }, 8000);

    // Username Toggle
    $('[data-toggle="tooltip"]').tooltip();

    // Get Notif
    updateOption();
});

function getDataUser(userId) {
    var usersElement = $('#users-data');
    var usersData = usersElement.data('users');

    for (var i = 0; i < usersData.length; i++) {

        var userData = usersData[i];

        if (userData.id == userId) {
            return userData;
        }
    }
}

function changeReceiver(customerId) {
    let userData = getDataUser(customerId);

    $('.image-user img').prop('src', `http://localhost:8000/storage/${ userData.photo_profile }`);
    $('.image-user h5').text(`${userData.name}`);
}

function moveCustomer(userId) {

    $('.user-list.active a').addClass('text-dark');
    $('.user-list.active i').addClass('text-dark');

    $('.user-list.active').removeClass('active');
    $('.user-list[user-id="' + userId + '"]').addClass('active');

    $('.user-list.active a').removeClass('text-dark');
    $('.user-list.active i').removeClass('text-dark');
    $('.user-list.active a').addClass('text-light');
    $('.user-list.active i').addClass('text-light');

    let customerId = $('.user-list.active').attr('user-id');
    changeReceiver(customerId);
    updateIsRead(customerId);

    showChat('show');
}

function showChat(dec) {

    let customerId = $('.user-list.active').attr('user-id');

    if (customerId === '1') {
        customerId = loginId;
    }

    let urlGet = '/api/live-chat/' + customerId;

    // console.log(loginId, ' : ', customerId);

    $.ajax({
        type: 'GET',
        url: urlGet,
        data: {},
        success: function(response) {
            // console.log(response);
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

            if (dec != 'delete' && dec != 'edit') {
                scrollToBottom();
            }
        }
    });
}

function addNewChat(chat) {

    let customerId = $('.user-list.active').attr('user-id');

    let chatId = chat['chat_id'];
    let senderId = chat['sender_id'];
    let receiverId = chat['receiver_id'];
    let chatText = chat['chat'];
    let file = chat['file'];
    let dateTime = chat['date_time'];
    let isRead = chat['is_read'];

    let receiverData = getDataUser(customerId);
    let senderData = getDataUser(loginId);
    let senderProfile = senderData.photo_profile;
    let receiverProfile = receiverData.photo_profile;
    let senderName = senderData.name;
    let receiverName = receiverData.name;

    let temp_html = ``;
    let temp_file_html = ``;
    // console.log(chatText);

    if (file != 'knowhere') {
        temp_file_html = `
            <div style="background-color: rgba(150, 133, 143, 0.5); padding: 8px; border-radius: 4px 4px 0 0;">
                <span style="display: block; background-color: white; padding: 4px; border-radius: 4px 4px 0 0; text-align: center;">
                    <a href="http://localhost:8000/storage/${file}" style="color: black;" download>Download File</a>
                </span>
            </div>
        `;
    }

    if (loginId === senderId) {
        temp_html = `
        <table id="sender">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td id="user-chat">
                    ${senderName}
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    ${temp_file_html}
                </td>
                <td></td>
            </tr>
            <tr id="${chatId}">
                <td id="delete-chat" onclick="openModalConfirm(${chatId})">
                    <div>
                        <img src='http://localhost:8000/static/image/delete-icon.png' alt="delete-icon">
                    </div>
                </td>
                <td></td>
                <td id="edit-chat" onclick="changeToEdit(${chatId})">
                    <div>
                        <img src='http://localhost:8000/static/image/edit-icon.png' alt="delete-icon">
                    </div>
                </td>
                <td></td>
                <td id="chat-sender" class="chat-text">
                    ${chatText}
                </td>
                <td>
                    <img src='http://localhost:8000/storage/${ senderProfile }' class="img-circle elevation-2" alt="sender-img">
                </td>
            </tr>
            <tr id="date-time">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    <span>${dateTime}</span>
                </td>
                <td></td>
            </tr>
        </table>
        `;
    } else {
        temp_html = `
        <table id="receiver">
            <tr>
                <td></td>
                <td id="user-chat">
                    ${receiverName}
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    ${temp_file_html}
                </td>
                <td></td>
                <td></td>
            </tr>
            <tr id="${chatId}">
                <td>
                    <img src='http://localhost:8000/storage/${receiverProfile}' class="img-circle elevation-2" alt="receiver-img">
                </td>
                <td id="chat-receiver" class="chat-text">
                    ${chatText}
                </td>
            </tr>
            <tr id="date-time">
                <td></td>
                <td>
                    <span>${dateTime}</span>
                </td>
            </tr>
        </table>
        `;
    }

    // console.log(temp_html);

    $('#content-chat').append(temp_html);
}

function sendChat() {

    let customerId = $('.user-list.active').attr('user-id');
    let senderId = loginId;
    let receiverId = customerId;
    let chat = $('#chat-input').val();
    let file = $('#file-input').prop('files')[0];

    if (!file) {
        file = 'knowhere';
    }

    let formData = new FormData();
    formData.append('sender_id', senderId);
    formData.append('receiver_id', receiverId);
    formData.append('chat', chat);
    formData.append('file', file);
    formData.append('is_read', 0);

    // for (let pair of formData.entries()) {
    //     console.log(pair);
    //   }
    // return;

    $.ajax({
        type: 'POST',
        url: '/api/live-chat',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // return console.log(response);
            let chat = response['data'];
            document.cookie = "last-chat=" + chat['chat_id'];

            $('#chat-input').val('');
            $('#send-chat').css('display', 'none');
            addNewChat(chat);
            scrollToBottom();
            // chatSound.play();
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

function deleteChat(chat_id) {
    closeModalConfirm();

    $.ajax({
        type: 'DELETE',
        url: `/api/live-chat/${chat_id}`,
        data: {},
        success: function(response) {
            showChat('delete');
        }
    });
}

function editChat(chat_id) {

    let customerId = $('.user-list.active').attr('user-id');
    let senderId = loginId;
    let receiverId = customerId;
    let chat = $('#chat-input').val();
    chat += ' (edited)';
    let file = $('#file-input').prop('files')[0];

    if (!file) {
        file = 'knowhere';
    }

    let formData = new FormData();
    formData.append('_method', 'PUT');
    formData.append('sender_id', senderId);
    formData.append('receiver_id', receiverId);
    formData.append('chat', chat);
    formData.append('file', file);
    formData.append('is_read', 0);

    // for (let pair of formData.entries()) {
    //     console.log(pair);
    //   }
    // return;

    // let data = {
    //     sender_id: senderId,
    //     receiver_id: receiverId,
    //     chat: chat,
    //     file: file,
    //     is_read: 0,
    // }

    $.ajax({
        type: 'POST',
        url: `/api/live-chat/${chat_id}`,
        // data: data,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {

            $('#chat-input').val('');
            $('#send-chat').css('display', 'none');
            showChat('edit');
            closeEdit();
            // chatSound.play();
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
}

function changeToEdit(chat_id) {
    let chatInput = $('#chat-input');
    let chatContent = $(`tr#${chat_id} .chat-text`).text().trim();
    let minimize = $('#minimize');
    let minimizeChat = $('#minimize a');
    let closeChat = $('#minimize a img');
    let sendChat = $('#send-chat');

    minimize.attr('onclick', 'closeEdit()');
    minimizeChat.removeAttr('href');
    closeChat.attr('src', 'http://localhost:8000/static/image/close-icon.png');
    chatInput.val(chatContent);
    sendChat.attr('onclick', `editChat(${chat_id})`);
}

function closeEdit() {
    let chatInput = $('#chat-input');
    let minimize = $('#minimize');
    let closeChat = $('#minimize a img');
    let sendChat = $('#send-chat');

    minimize.removeAttr('onclick');
    closeChat.attr('src', 'http://localhost:8000/static/image/minimize-icon.png');
    chatInput.val('');
    sendChat.attr('onclick', 'sendChat()');

    setTimeout(function() {
        minimizeChat();
    }, 8000);
}

function changeInputFile() {
    let minimize = $('#minimize');
    let minimizeChat = $('#minimize a');
    let closeChat = $('#minimize a img');

    minimize.attr('onclick', 'closeInputFile()');
    minimizeChat.removeAttr('href');
    closeChat.attr('src', 'http://localhost:8000/static/image/close-icon.png');
}

function closeInputFile() {
    let chatInput = $('#chat-input');
    let minimize = $('#minimize');
    let closeChat = $('#minimize a img');

    chatInput.prop('disabled', false);
    minimize.removeAttr('onclick');
    closeChat.attr('src', 'http://localhost:8000/static/image/minimize-icon.png');
    chatInput.val('');

    setTimeout(function() {
        minimizeChat();
    }, 8000);
}

function minimizeChat() {
    let minimizeChat = $('#minimize a');
    minimizeChat.attr('href', '/');
}

function openModalConfirm(chat_id) {
    $('#confirmDeleteModal').modal('show');
    $('#confirmDeleteButton').attr('onclick', `deleteChat(${chat_id})`);
    closeEdit();
}

function closeModalConfirm() {
    $('#confirmDeleteModal').modal('hide');
}

function scrollToBottom() {
    $("html, body").animate({ scrollTop: "80000px" });
}

function checkInputChat() {
    let sendChat = $('#send-chat');
    let chatInput = $('#chat-input');
    if (chatInput.val().trim() !== '') {
        sendChat.css('display', 'flex');
        return true;
    } else {
        sendChat.css('display', 'none');
        return false;
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

function updateNotif(sender_id) {
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
            chatNotif.append(total);
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
    $('#list-user li').each(function() {
        var userId = $(this).attr('user-id');
        updateNotif(userId);
    });
}
