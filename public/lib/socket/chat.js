const WS_URL = $('meta[name=ws_url]').attr("content");
const USER_ID = $('meta[name=user_id]').attr("content");
const AREA_ID = $('meta[name=area_id]').attr("content");
const QUESTION_ID = $('meta[name=question_id]').attr("content");
var socket = io(WS_URL, { query: "id= "+USER_ID });


//chat el
var app = new Vue({
    el: '#chatApp',
    data: {
        totalmsgCount : 0,
        user_id: USER_ID,
        chatLists: [],
        chatBox: [],
        socketConnected : {
            status: false,
            msg: 'Connecting Please Wait...'
        },
        bArr: {}
    },
    methods: {
        chat: function(chat){
            if(!this.chatBox.includes(chat.id)){
                chat.msgCount = 0;
                chat.totalmsgCount = 0;
                const chatboxObj = Vue.extend(chatbox);
                let b = new chatboxObj({
                    propsData: {
                        socket: socket,
                        user_id: this.user_id,
                        cChat: chat,
                        chatBoxClose: this.chatBoxClose,
                        chatBoxMinimize: this.chatBoxMinimize
                    }
                }).$mount();
                $('body').append(b.$el);
                this.bArr[chat.id] = b;
                this.chatBox.unshift(chat.id);
                $('#msginput-'+chat.id).focus();
            }else {
                var index = this.chatBox.indexOf(chat.id);
                this.chatBox.splice(index, 1);
                this.chatBox.unshift(chat.id);
                $('#msginput-'+chat.id).focus();
            }
            this.calcChatBoxStyle();
        },
        chatBoxClose: function(eleId){
            $('#chatbox-'+eleId).remove();
            this.bArr[eleId].$destroy();
            var index = this.chatBox.indexOf(eleId);
            this.chatBox.splice(index, 1);
            this.calcChatBoxStyle();
        },
        chatBoxMinimize: function(eleId){
            $("#chatbox-"+eleId+" .box-body, #chatbox-"+eleId+" .box-footer").slideToggle('slow');
        },
        calcChatBoxStyle(){
            var i = '10em'; // start position
            var j = 260;  //next position
            this.chatBox.filter(function (value, key) {
                if(key < 4){
                    $('#chatbox-'+value).css("right",i).show();
                    i = i + j;
                }else {
                    $('#chatbox-'+value).hide();
                }

            });
        }
    }
});

//notif el
var notif = new Vue({
    el: '#notifApp',
    data: {
        totalnotifCount : 0,
        user_id: USER_ID,
        orderLists: [],
        orderBox: [],
        socketConnected : {
            status: false,
            msg: 'Connecting Please Wait...'
        },
        bArr: {}
    },
    props: ['id','order_code', 'socket'],

    // mounted: function(){
    //     socket.emit('order');
    //     socket.on('getOrderResponse', this.getOrderResponse);
    //     socket.on('addOrderResponse', this.addOrderResponse);
    // },

    methods: {
        order: function (){
            const orderBoxObj = Vue.extend(orderBox);
            let b = new orderBoxObj({
                propsData: {
                    socket: socket,
                    user_id: this.user_id,
                    // cOrder: chat,
                    // chatBoxClose: this.chatBoxClose,
                    // chatBoxMinimize: this.chatBoxMinimize
                }
            }).$mount();
            $('body').append(b.$el);
            console.log(this.totalnotifCount);
            // console.log(this.orderLists);
            // socket.emit('addOrder', orderPacket);
            // this.orderLists.push(orderPacket);
            // notif.totalnotifCount = 0;

            // this.orderLists = "";
            // this.scrollToBottom();
            // console.log(this.orderLists)
            // this.totalnotifCount = this.totalnotifCount + 1;
            // this.bArr = b;
            // console.log(this.bArr)
            // this.chatBox.unshift(chat.id);
            // $('#msginput-'+chat.id).focus();
        }


    },
});


//approve el
var approve = new Vue({
    el: '#approveApp',
    data: {
        totalApproveCount : 0,
        approveLists: [],
        approveBox: [],

        bArr: {}
    },
    props: ['id','type'],


    methods: {
        reseller: function (){
            const approveBoxObj = Vue.extend(approveBox);
            let b = new approveBoxObj({
                propsData: {
                    // socket: socket,
                    // user_id: this.user_id,
                    // cOrder: chat,
                    // chatBoxClose: this.chatBoxClose,
                    // chatBoxMinimize: this.chatBoxMinimize
                }
            }).$mount();
            $('body').append(b.$el);
            console.log(this.totalApproveCount);
            // console.log(this.orderLists);
            // socket.emit('addOrder', orderPacket);
            // this.orderLists.push(orderPacket);
            // notif.totalnotifCount = 0;

            // this.orderLists = "";
            // this.scrollToBottom();
            // console.log(this.orderLists)
            // this.totalnotifCount = this.totalnotifCount + 1;
            // this.bArr = b;
            // console.log(this.bArr)
            // this.chatBox.unshift(chat.id);
            // $('#msginput-'+chat.id).focus();
        }


    },
});



// init
socket.on('connect', function(data){
    app.socketConnected.status = true;
    socket.emit('chatList',app.user_id);
    socket.emit('orderList', AREA_ID);
    socket.emit('approveList',AREA_ID);
});

socket.on('connect_error', function(){
    app.socketConnected.status = false;
    notif.socketConnected.status = false;
    app.socketConnected.msg = 'Could not connect to server';
    app.chatLists = [];
    notif.orderLists = [];
});

socket.on('orderListRes', function(data){
    if (QUESTION_ID === '-')
    {
        if (data.orderLists)
        {
            notif.totalnotifCount = data.orderLists.length;
            notif.orderLists = data.orderLists;
        }
    }

});

socket.on('approveListRes', function(data){
    if (QUESTION_ID === '-'){
        if (data.approveLists)
        {
            approve.totalApproveCount = data.approveLists.length;
            approve.approveLists = data.approveLists;
        }
    }
});



socket.on('chatListRes', function(data){
    if (data.userDisconnected) {
        app.chatLists.findIndex(function(el) {
            if(el.socket_id == data.socket_id){
                el.online = 'N';
                el.socket_id = '';
            }
        });
    }else if (data.userConnected) {
        app.chatLists.findIndex(function(el) {
            if(el.id == data.userId){
                el.online = 'Y';
                el.socket_id = data.socket_id;
            }
        });
    }else {
        data.chatList.findIndex(function(el) {
            el.msgCount = 0;
        });
        app.totalmsgCount = 0;
        app.chatLists = data.chatList;
    }
});
// user chat box not open, count incomming  messages
socket.on('addMessageResponse', function(data){
    if(!app.chatBox.includes(data.fromUserId)){
        app.chatLists.findIndex(function(el, el1) {
            if(el.id == data.fromUserId){
                el.msgCount += 1;
                app.totalmsgCount += 1;
            }
        });
    }
});

var chatbox = {
    data: function () {
        return {
            messages: [],
            message: '',
            typing: '',
            timeout: ''
        }
    },
    props: ['user_id','cChat', 'socket', 'chatBoxClose', 'chatBoxMinimize'],
    mounted: function(){
        socket.emit('getMessages', {fromUserId: this.user_id,toUserId: this.cChat.id});
        socket.on('getMessagesResponse', this.getMessagesResponse);
        socket.on('addMessageResponse', this.addMessageResponse);
        socket.on('typing', this.typingListener);
        socket.on('image-uploaded', this.imageuploaded);
    },
    destroyed: function() {
        socket.removeListener('getMessagesResponse', this.getMessagesResponse);
        socket.removeListener('addMessageResponse', this.addMessageResponse);
        socket.removeListener('typing', this.typingListener);
    },
    methods: {
        sendMessage: function(event){
            if(event.keyCode === 13){
                if (this.message.length > 0) {
                    let messagePacket = this.createMsgObj('text', '', this.message);
                    this.socket.emit('addMessage', messagePacket);
                    this.messages.push(messagePacket);
                    this.message = "";
                    this.scrollToBottom();
                }else{
                    alert("Please Enter Your Message.");
                }
            }else{
                if((event.keyCode != 116) && (event.keyCode != 82 && !event.ctrlKey)){
                    this.socket.emit('typing', {typing:'typing...',socket_id:this.cChat.socket_id});
                    clearTimeout(this.timeout);
                    this.timeout = setTimeout(this.timeoutFunction, 500);
                }
            }
        },
        timeoutFunction: function(){
            socket.emit("typing", {typing:false,socket_id:this.cChat.socket_id});
        },
        scrollToBottom: function(){
            $("#chatboxscroll-"+this.cChat.id).stop().animate({ scrollTop: $("#chatboxscroll-"+this.cChat.id)[0].scrollHeight}, 1);
        },
        createMsgObj : function(type, fileFormat, message){
            return {
                type: type,
                fileFormat: fileFormat,
                filePath: '',
                fromUserId: this.user_id,
                toUserId: this.cChat.id,
                toSocketId: this.cChat.socket_id,
                message: message,
                time: new moment().format("hh:mm A"),
                date: new moment().format("Y-MM-D")
            }
        },
        addMessageResponse: function(data){
            if (data && data.fromUserId == this.cChat.id) {
                this.messages.push(data);
                this.scrollToBottom();
            }
        },
        typingListener: function(data){
            if (data.typing && data.to_socket_id == this.cChat.socket_id) {
                this.typing = "is "+data.typing;
            } else {
                this.typing = "";
            }
        },
        getMessagesResponse: function(data){
            if (data.toUserId == this.cChat.id) {
                this.messages = data.result;
                this.$nextTick(function () {
                    this.scrollToBottom();
                });
            }
        },
        imageuploaded: function(data){
            if (data && data.toUserId == this.cChat.id) {
                $(".overlay").parent().parent().remove();
                this.messages.push(data);
                this.scrollToBottom();
            }
        },
        file: function(event){
            var file = event.target.files[0];
            if (this.validateSize(file)) {
                let fileFormat = file.type.split('/')[0];
                let reader  = new FileReader();
                reader.onload = function () {
                    let messagePacket = this.createMsgObj('file', fileFormat, reader.result);
                    messagePacket['fileName'] = file.name;
                    socket.emit('upload-image', messagePacket);
                    messagePacket.type = "text";
                    if(fileFormat != 'image'){
                        messagePacket.message = '<span class="info-box-icon bg-primary" style="color: white;background:none;"><i class="fa fa-paperclip"></i></span><div class="overlay"><i style="color:#fff" class="fa fa-refresh fa-spin"></i></div>';
                    }else {
                        let src = URL.createObjectURL(new Blob([reader.result]));
                        messagePacket.message = '<img height="100px;" width="100px;" src="'+src+'"><div class="overlay"><i style="color:#fff" class="fa fa-refresh fa-spin"></i></div>';
                    }
                    this.messages.push(messagePacket);
                    this.scrollToBottom();
                }.bind(this);
                reader.readAsArrayBuffer(file);
            }else {
                event.target.value = "";
                alert('File size exceeds 10 MB');
            }
        },
        validateSize: function(file) {
            var fileSize = file.size / 1024 / 1024; // in MB
            if (fileSize > 10) {
                return false;
            }
            return true;
        }
    },
    filters: {
        dateFormat: function(value) {
            return new moment(value).format("D-MMM-YY")
        }
    },
    template: `
        <div class="chat_box" v-bind:id="'chatbox-' + cChat.id" >
            <div class="col-md-12 col-sm-12">
                <div class="card">
                  
                  
                    <div class="card-header bg-primary text-white">
                        <div class="media-left">
                            <div class="avatar">
                                <img :src="(cChat.profile_picture ? '/storage/images/'+  cChat.profile_picture : '/img/no_image.jpg')"  alt="p" width="32" height="32">
                            </div>
                            
                        </div>
                        <div class="media-body ml-1">
                            <span class="font-weight-bolder"> {{cChat.username}} </span><br>
                            <small class="notification-text"> {{cChat.groupname}} <br>{{ typing }}</small>
                        </div>
                        
                        <div class="media-right">
                            <ul class="list-inline mb-0">
                                <li>
                                    <a data-action="close" @click="chatBoxClose(cChat.id)">
                                        <span style="font-weight: bold; font-size: 1em">X</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="card-content collapse show">
                        <div class="card-body user-chats" style="background-color: #F2F0F7; ">
                            <div class="message_container">
                                <div class="message">
                                      <div class="direct-chat-messages" v-bind:id="'chatboxscroll-' + cChat.id">
                                        <div v-for="messagePacket in messages" class="direct-chat-msg" v-bind:class="{ 'right' : (messagePacket.fromUserId == user_id) }" >
                                           
                                            <div v-if="messagePacket.type == 'text'" v-bind:class="{ 'pull-right text-sender ' : (messagePacket.fromUserId == user_id), 'pull-left text-receiver' : (messagePacket.fromUserId != user_id) }" v-html=messagePacket.message 
                                            class="direct-chat-text clearfix" style="margin-right: 1px;margin-left: 1px;word-break: break-all;padding: 3px 10px; width: 100%; padding: 5px">
                                            </div>
                                             <div class="direct-chat-info clearfix">
                                                <small class="direct-chat-timestamp"  v-bind:class="{ 'pull-right ' : (messagePacket.fromUserId == user_id), 'pull-left ' : (messagePacket.fromUserId != user_id) }">{{ messagePacket.date | dateFormat }},{{ messagePacket.time }}</small>
                                            </div>
                        
                                           
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    <div style="display: block; padding:10px" class="box-footer">
                        <div class="input-group">
                            <input name="message" v-bind:id="'msginput-' + cChat.id" v-model.trim="message" placeholder="Type Message And Hit Enter" class="form-control" type="text"
                             v-on:keydown="sendMessage($event)">
                            <span class="input-group-btn">
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>`
};


var orderBox = {
    // data: function () {
    //     return {
    //         order: []
    //     }
    // },
    props: ['id','order_code', 'socket'],
    mounted: function(){
        socket.emit('order');
        socket.on('getOrderResponse', this.getOrderResponse);
        socket.on('addOrderResponse', this.addOrderResponse);

    },
    destroyed: function() {
        socket.removeListener('getOrderResponse', this.getOrderResponse);
        socket.removeListener('addOrderResponse', this.addOrderResponse);
    },
    methods: {
        sendOrder: function(){
            let orderPacket = this.createOrderObj();
            // this.socket.emit('addOrder', orderPacket);

            const orderBoxObj = Vue.extend(orderBox);
            let b = new orderBoxObj({
                propsData: {
                    socket : socket,
                    orderData : orderPacket
                }
            });
            $('body').append(b.$el);
            console.log(orderPacket);
            socket.emit('addOrder', orderPacket);
            this.orderLists.push(orderPacket);
            // this.orderLists = "";
            // this.scrollToBottom();
            console.log(this.orderLists)
            this.totalnotifCount = this.totalnotifCount + 1;
            // notif.totalnotifCount = this.orderList.length;
            // notif.orderLists = this.orderList;


            // this.bArr[order.order_code] = b;
            // this.orderBox.unshift(order.order_code);
        },

        createOrder : function(){
            let orderPacket = this.createOrderObj();
            this.socket.emit('addOrder', orderPacket);
            this.order.push(orderPacket);
            this.order = "";
            this.scrollToBottom();

        },
        createOrderObj : function(){
            return {
                order_code: '1',
                time: new moment().format("hh:mm A"),
                date: new moment().format("Y-MM-D")
            }
        },
        scrollToBottom: function(){
            $("#chatboxscroll-"+this.cChat.id).stop().animate({ scrollTop: $("#chatboxscroll-"+this.cChat.id)[0].scrollHeight}, 1);
        },
        addOrderResponse: function(data){
            this.order.push(data);
            console.log(order);
            this.scrollToBottom();
        },
        getOrderResponse: function(data){
            this.order = data.result;
            this.$nextTick(function () {
                this.scrollToBottom();
            });
        },
    },
    filters: {
        dateFormat: function(value) {
            return new moment(value).format("D-MMM-YY")
        }
    },
    template: `
        <p>a</p>
       <!-- <div class="order_box" v-bind:id="'orderBox'" >
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    
                    
                    <div class="card-content collapse show">
                        <div class="card-body user-chats" style="background-color: #F2F0F7; ">
                            <div class="message_container">
                                <div class="order">
                                      <div class="direct-chat-messages" v-bind:id="'orderBoxscroll-'">
                                        <div v-for="order in orderPacket" class="direct-chat-msg" v-bind:class="right" >
                                           
                                           <li class="scrollable-container media-list">
                                                <a class="d-flex" href="javascript:void(0)">
                                                    <div class="media d-flex align-items-start">
                                                        <div class="media-left">
                                                            <div class="avatar">
                                                                <img src="{{asset('vuexy/app-assets/images/portrait/small/avatar-s-15.jpg')}}" alt="avatar" width="32" height="32">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading">
                                                                <span class="font-weight-bolder">Congratulation Sam 🎉</span>winner!
                                                            </p>
                                                            <small class="notification-text"> Won the monthly best seller badge.</small>
                                                        </div>
                                                    </div>
                                                </a>
                        
                                                <a class="d-flex" href="javascript:void(0)">
                                                    <div class="media d-flex align-items-start">
                                                        <div class="media-left">
                                                            <div class="avatar bg-light-danger">
                                                                <div class="avatar-content">
                                                                    <i class="avatar-icon" data-feather="x"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading">
                                                                <span class="font-weight-bolder">Server down</span>&nbsp;registered
                                                            </p>
                                                            <small class="notification-text"> USA Server is down due to hight CPU usage</small>
                                                        </div>
                                                    </div>
                                                </a>
                        
                                            </li>
                                            &lt;!&ndash;<div v-if="messagePacket.type == 'text'" v-bind:class="{ 'pull-right text-sender ' : (messagePacket.fromUserId == user_id), 'pull-left text-receiver' : (messagePacket.fromUserId != user_id) }" v-html=messagePacket.message 
                                            class="direct-chat-text clearfix" style="margin-right: 1px;margin-left: 1px;word-break: break-all;padding: 3px 10px; width: 100%; padding: 5px">
                                            </div>
                                             <div class="direct-chat-info clearfix">
                                                <small class="direct-chat-timestamp"  v-bind:class="{ 'pull-right ' : (messagePacket.fromUserId == user_id), 'pull-left ' : (messagePacket.fromUserId != user_id) }">{{ messagePacket.date | dateFormat }},{{ messagePacket.time }}</small>
                                            </div>&ndash;&gt;
                        
                                           
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    &lt;!&ndash;<div style="display: block; padding:10px" class="box-footer">
                        <div class="input-group">
                            <input name="message" v-bind:id="'msginput-' + cChat.id" v-model.trim="message" placeholder="Type Message And Hit Enter" class="form-control" type="text" v-on:keydown="sendMessage($event)">
                            <span class="input-group-btn">
                            </span>
                        </div>
                    </div>&ndash;&gt;
                </div>
            </div>
        </div>-->

        `
};


var approveBox = {
    // data: function () {
    //     return {
    //         order: []
    //     }
    // },
    props: ['id','order_code', 'socket'],
    mounted: function(){
        socket.emit('order');
        socket.on('getOrderResponse', this.getOrderResponse);
        socket.on('addOrderResponse', this.addOrderResponse);

    },
    destroyed: function() {
        socket.removeListener('getOrderResponse', this.getOrderResponse);
        socket.removeListener('addOrderResponse', this.addOrderResponse);
    },
    methods: {
        sendOrder: function(){
            let orderPacket = this.createOrderObj();
            // this.socket.emit('addOrder', orderPacket);

            const orderBoxObj = Vue.extend(orderBox);
            let b = new orderBoxObj({
                propsData: {
                    socket : socket,
                    orderData : orderPacket
                }
            });
            $('body').append(b.$el);
            console.log(orderPacket);
            socket.emit('addOrder', orderPacket);
            this.orderLists.push(orderPacket);
            // this.orderLists = "";
            // this.scrollToBottom();
            console.log(this.orderLists)
            this.totalnotifCount = this.totalnotifCount + 1;
            // notif.totalnotifCount = this.orderList.length;
            // notif.orderLists = this.orderList;


            // this.bArr[order.order_code] = b;
            // this.orderBox.unshift(order.order_code);
        },

        createOrder : function(){
            let orderPacket = this.createOrderObj();
            this.socket.emit('addOrder', orderPacket);
            this.order.push(orderPacket);
            this.order = "";
            this.scrollToBottom();

        },
        createOrderObj : function(){
            return {
                order_code: '1',
                time: new moment().format("hh:mm A"),
                date: new moment().format("Y-MM-D")
            }
        },
        scrollToBottom: function(){
            $("#chatboxscroll-"+this.cChat.id).stop().animate({ scrollTop: $("#chatboxscroll-"+this.cChat.id)[0].scrollHeight}, 1);
        },
        addOrderResponse: function(data){
            this.order.push(data);
            console.log(order);
            this.scrollToBottom();
        },
        getOrderResponse: function(data){
            this.order = data.result;
            this.$nextTick(function () {
                this.scrollToBottom();
            });
        },
    },
    filters: {
        dateFormat: function(value) {
            return new moment(value).format("D-MMM-YY")
        }
    },
    template: `
        <p>a</p>
       <!-- <div class="order_box" v-bind:id="'orderBox'" >
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    
                    
                    <div class="card-content collapse show">
                        <div class="card-body user-chats" style="background-color: #F2F0F7; ">
                            <div class="message_container">
                                <div class="order">
                                      <div class="direct-chat-messages" v-bind:id="'orderBoxscroll-'">
                                        <div v-for="order in orderPacket" class="direct-chat-msg" v-bind:class="right" >
                                           
                                           <li class="scrollable-container media-list">
                                                <a class="d-flex" href="javascript:void(0)">
                                                    <div class="media d-flex align-items-start">
                                                        <div class="media-left">
                                                            <div class="avatar">
                                                                <img src="{{asset('vuexy/app-assets/images/portrait/small/avatar-s-15.jpg')}}" alt="avatar" width="32" height="32">
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading">
                                                                <span class="font-weight-bolder">Congratulation Sam 🎉</span>winner!
                                                            </p>
                                                            <small class="notification-text"> Won the monthly best seller badge.</small>
                                                        </div>
                                                    </div>
                                                </a>
                        
                                                <a class="d-flex" href="javascript:void(0)">
                                                    <div class="media d-flex align-items-start">
                                                        <div class="media-left">
                                                            <div class="avatar bg-light-danger">
                                                                <div class="avatar-content">
                                                                    <i class="avatar-icon" data-feather="x"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <p class="media-heading">
                                                                <span class="font-weight-bolder">Server down</span>&nbsp;registered
                                                            </p>
                                                            <small class="notification-text"> USA Server is down due to hight CPU usage</small>
                                                        </div>
                                                    </div>
                                                </a>
                        
                                            </li>
                                            &lt;!&ndash;<div v-if="messagePacket.type == 'text'" v-bind:class="{ 'pull-right text-sender ' : (messagePacket.fromUserId == user_id), 'pull-left text-receiver' : (messagePacket.fromUserId != user_id) }" v-html=messagePacket.message 
                                            class="direct-chat-text clearfix" style="margin-right: 1px;margin-left: 1px;word-break: break-all;padding: 3px 10px; width: 100%; padding: 5px">
                                            </div>
                                             <div class="direct-chat-info clearfix">
                                                <small class="direct-chat-timestamp"  v-bind:class="{ 'pull-right ' : (messagePacket.fromUserId == user_id), 'pull-left ' : (messagePacket.fromUserId != user_id) }">{{ messagePacket.date | dateFormat }},{{ messagePacket.time }}</small>
                                            </div>&ndash;&gt;
                        
                                           
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    
                    &lt;!&ndash;<div style="display: block; padding:10px" class="box-footer">
                        <div class="input-group">
                            <input name="message" v-bind:id="'msginput-' + cChat.id" v-model.trim="message" placeholder="Type Message And Hit Enter" class="form-control" type="text" v-on:keydown="sendMessage($event)">
                            <span class="input-group-btn">
                            </span>
                        </div>
                    </div>&ndash;&gt;
                </div>
            </div>
        </div>-->

        `
};
