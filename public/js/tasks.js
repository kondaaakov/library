let answerEl = document.querySelector('.task_answer');
let childAnswerEl = answerEl.firstElementChild;

if(childAnswerEl.nodeName === 'OL') {
    childAnswerEl.className += 'answer_list';

    childAnswerEl.childNodes.forEach(function (item) {
        if (item.nodeName === 'LI') {
            item.className += 'answer_list_li';

            item.childNodes.forEach(function (childItem) {
                if(childItem.nodeName === 'CODE') {
                    childItem.className += 'answer_text_code';
                }
            })
        }
    })
} else if (childAnswerEl.nodeName === 'CODE') {
    childAnswerEl.className += 'onebook_code';
}

//answerEl.childNodes[1].nodeName === 'OL'