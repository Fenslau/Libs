require('./bootstrap');

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function () {
  $(document).on('click', '#se', function (e) {
      e.preventDefault();

  });
});


$(document).ready(function () {
  $(document).on('submit', '[name="my_search"]', function (e) {
      e.preventDefault();
      var form = document.querySelector('[name="my_search"]');
      var data = new FormData(form);
      axios.post(form.action, data)
      .then(function (response) {
        $('.toast-header').removeClass('bg-danger');
        $('.toast-header').addClass('bg-success');
        $('.toast-body').html(response.data.message);
        $('.toast').toast('show');
        $('#my_search').modal('hide')
        axios.get("/")
        .then(function (response) {
          $('#users').html(response.data.html);
          window.location = "#users";
        })
      })
      .catch(function (error) {
        console.log(error);
        $('.toast-header').addClass('bg-danger');
        $('.toast-header').removeClass('bg-success');
        $('.toast-body').html('Что-то пошло не так. Попробуйте ещё раз или сообщите нам');
        $('.toast').toast('show');
        $('#my_search').modal('hide')
      });
  });
});


$(document).ready(function () {
    Echo.join('presence')
      .here((users) => {

      })
      .joining((user) => {
          console.log(user.name);
      })
      .leaving((user) => {
          console.log(user.name);
      })
      .error((error) => {
          console.error(error);
      });
})
window.onunload = function() {
  Echo.leave('presence');
};
