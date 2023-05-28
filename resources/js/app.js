import 'bootstrap';
//import './script';

const timeWrapper = Array.from( document.querySelectorAll('.timeWrapper'));

function time(time) {
    
    const month = ['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec'];
    let year = [];
    let month_i;
    let day;
    let hour = [];

    let i = 0;

    while (time[i]!="-") {
        year.push(time[i]);
        i++;
    }
    i++;
    month_i = month[Number(time[i]+time[i+1])-1];
    i+=3;
    day = Number(time[i]+time[i+1]);
    i+=3;
    for (; i < time.length; i++) {
        hour.push(time[i]);
    }

    return (month_i + ", " + day + " " + year.join('') + " at " + hour.join(''));

}

for (let i = 0; i < timeWrapper.length; i++) {
    timeWrapper[i].innerHTML = (time(timeWrapper[i].innerHTML));
}