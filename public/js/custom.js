$( function() {
    $( ".datepicker" ).datepicker();
} );

$(".select-question").on('click', function() {
    OnlineExam.getQuestion($(this).attr('data'));
})

$("#save_answer").on('click', function() {
    let question_id = $('#assesment_title').attr('data');
    let exam_id = $('#exam_title').attr('data');
    let selected_option_id = $('#hidden_selected_option').attr('data');
    let selected_option = $('#hidden_selected_option').attr('selected-option');
    OnlineExam.saveAnswer(question_id, exam_id, selected_option_id, selected_option);
})

$(".selected_option").on('click', function() {
    let option_id = $(this).attr('data');
    let selected_option = $(this).attr('alpha-option');
    $('.selected_option').attr("selected_id", "");
    $(this).attr("selected_id", "selected");
    OnlineExam.setSelectedOption(option_id, selected_option);
})

$("#mark_later").on('click', function() {
    let question_id = $('#assesment_title').attr('data');
    $('.question_btn_' + question_id).addClass("question-pending");
})


var OnlineExam = {
    
    getQuestion: function(id) {
        if(id !=''){
            $.ajax({
                url:  "/user/exam/assesment-test/question/" + id,
                method: "GET",
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(result){
                $('#assesment_title').text(result.question.title);
                $('#question_number').text('Q'+result.question.id + '. ')
                // console.log(result.question.id);
                $('#assesment_title').attr('data', result.question.id);
                $('#assesment_description').text(result.question.description);
                var count = 1;
                $.each(result.options, function(index, value) {
                    $('#option_' + count).text(value.option_title);
                    $('.option_val_' + count).attr('data', value.id);
                    count++;
                })
            })
        }
    },

    saveAnswer: function(question_id, exam_id, selected_option_id, selected_option) {
        if(question_id !='' && exam_id !='' && selected_option !='')
        {
            $.ajax({
                url: "/user/exam/assesment-test/question/save-answer/" + question_id,
                method: "GET",
                dataType: "json",
                data: {"question_id": question_id, 'exam_id': exam_id, 'selected_option_id': selected_option_id, 'selected_option': selected_option},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function(result) {
                $('.question_btn_' + question_id).addClass("question-attempted");
            }).fail(function(error) {
                console.log(error);
            })
        }else{
            alert('Please select right option for given question');
        }
    },

    setSelectedOption: function(option_id, selected_option) {
        $('#hidden_selected_option').attr('data', option_id);
        $('#hidden_selected_option').attr('selected-option', selected_option);
    }

}