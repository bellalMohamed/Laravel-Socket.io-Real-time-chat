Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');

var socket = io.connect('http://localhost:3000');

Vue.filter('timeago', function(value) {
	return moment.utc(value).local().fromNow();
});


new Vue({
	el: '#app',

	data: {
		message: {
			name: user,
			body: ''
		},
		messages: []
	},

	ready: function () {
		this.fetchMessages();

		socket.on('message', function(message) {
			this.messages.push(message);
		}.bind(this));
	},

	methods: {
		sendMessage: function (e) {
			e.preventDefault();
			socket.emit('message', this.message);
			this.$http.post('/api/messages', this.message);
			this.message = {name: user, body: ''};
		},

		fetchMessages: function () {
			this.$http.get('/api/messages').then(function (messages) {
				this.$set('messages', messages.json());
			});
		}
	}

});