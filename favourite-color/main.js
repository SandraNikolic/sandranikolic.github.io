alert('Remove your less favourite color from the set of rounded squares clicking on the rounded sqare with your less favourite color again and again! ')
const father = document.getElementById('color');
const arr2 = ['aqua','red', 'lime', 'violet', 'silver', 'green', 'black','navy', 'pink', 'brown', 'grey', 'gold', 'purple', 'teal', 'olive'];
let angle = 0;

for (i = 0; i < arr2.length; i++) {
    const p = document.createElement('p');
    const s = p.textContent = arr2[i];
    p.style.textTransform = 'uppercase';
    p.style.marginLeft = '200px';
    p.style.fontSize = '1.5em';
    p.style.className = arr2[i];
    p.style.fontWeight = '600';
    p.style.fontFamily = "'ZCOOL QingKe HuangYou', Coiny";
    const div = document.createElement('div');
    div.setAttribute('id', arr2[i]);
    div.style.background = arr2[i];
    div.style.borderRadius = '30%';
    div.style.marginBottom = '220px';
    div.style.width = '150px';
    div.style.height = '150px';
    div.style.marginLeft = '160px';
    father.appendChild(div);
    div.appendChild(p);

    function turnMe() {
        angle = (angle + 2) % 360;
        div.style.transform = `rotate(${angle}deg)`
    }
    setInterval(turnMe, 3000 / 10);
}

let arr = [];
const bodyy = document.getElementById('body');

bodyy.addEventListener('click', (x) => {
        if (arr.length < 14) {
            father.removeChild(x.target);

        }
        arr.push(x.target);
        console.log(arr);
        console.log(x.target);

        const divs = document.getElementsByTagName('div');
        let newText = '';
        let text = '';
        console.log(divs.length);
        if (divs.length === 2 &&  document.querySelectorAll('h3').length === 0 ) {
            newText = document.createElement('h3');
            bodyy.appendChild(newText);
            newText.style.marginTop = '200px';
            newText.style.fontSize = '2em';
            newText.style.marginLeft = '500px';
            newText.style.fontFamily = 'Comic Sans MS, Trebuchet MS, Impact';
            text = `Your favourite color is ${divs[1].textContent}!!!`
            return newText.textContent = text;
        }


    }

)

