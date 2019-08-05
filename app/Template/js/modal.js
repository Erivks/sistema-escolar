// This event fires immediately when the show instance method is called. 
// If caused by a click, the clicked element is available as the relatedTarget 
// property of the event.
$('#editarAluno').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var name = button.data('name');
    var birthday = button.data('birthday');
    var id = button.data('id');

    var modal = $(this);
    modal.find('#idInput').val(id);
    modal.find('#nameInput').val(name);
    modal.find('#birthdayInput').val(birthday);
});
$('#editarCurso').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var name = button.data('name');
    var workload = button.data('workload');
    
    var modal = $(this);
    modal.find('#idInput').val(id);
    modal.find('#nameInput').val(name);
    modal.find('#workloadInput').val(workload);
});

$('#editarMatricula').on('show.bs.modal', function(event){
    var button = $(event.relatedTarget);
    var registration = button.data('registration');
    var student = button.data('student');
    var course = button.data('course');

    var modal = $(this);
    
    modal.find('#idInput').val(registration);
    modal.find('#studentNameInput').val(student).prop('selected', true);
    modal.find('#courseNameInput').val(course).prop('selected', true);
});
