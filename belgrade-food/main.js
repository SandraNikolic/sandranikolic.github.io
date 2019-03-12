class Link {
    constructor(title, url, author) {
        let absoluteUrl = url;
        if (
            !absoluteUrl.startsWith("http://") &&
            !absoluteUrl.startsWith("https://")
        ) {
            // If not, add "http://" at the beginning
            absoluteUrl = `http://${absoluteUrl}`;
        }
        this.title = title;
        this.url = absoluteUrl;
        this.author = author;
    }
    toString() {
        return `${this.title}${this.url}${this.author}`;
    }

}
// Creating initial array with links: 
const links = [];
links.push(new Link('Šauarma Bar', 'http://www.sauarmabar.rs', 'Sandra'));
links.push(new Link('Asia Food', 'http://asiafood-bg.com', 'Sandra'));
links.push(new Link('Burrito Madre', 'http://burritomadre.com/', 'Sandra'));

const contentElement = document.getElementById('content');

const createLinkElement = link => {
    // Creating element for link title:
    const titleElement = document.createElement('a');
    titleElement.href = link.url;
    titleElement.classList.add('title');
    titleElement.textContent = link.title;

    // Creating element for link url:
    const urlElement = document.createElement('span');
    urlElement.classList.add('url');
    urlElement.textContent = `, ${link.url}`;

    // Creating heading to put together title and url elements:
    const headlineElement = document.createElement('h4');
    headlineElement.classList.add('headline');
    headlineElement.appendChild(titleElement);
    headlineElement.appendChild(urlElement);

    // Creating author element: 
    const authorElement = document.createElement('p');
    authorElement.classList.add('author');
    authorElement.textContent = `Submitted by ${link.author} `;
    authorElement.id = 'author';

    // Creating div for links:
    const linkElement = document.createElement('div');
    linkElement.classList.add('link');
    linkElement.appendChild(headlineElement);
    linkElement.appendChild(authorElement);
    return linkElement;
}

// Creating input element with attributes: 
const createInputElement = (name, placeholder, size) => {
    const inputElement = document.createElement('input');
    inputElement.type = 'text';
    inputElement.setAttribute('name', name);
    inputElement.setAttribute('placeholder', placeholder);
    inputElement.setAttribute('size', size);
    inputElement.setAttribute('required', 'true');
    inputElement.classList.add('input');
    return inputElement;
}

// Creating form element:
const createFormElement = () => {
    const titleElement = createInputElement('title', 'Enter link title', 20);
    const urlElement = createInputElement('url', 'Enter link URL', 20);
    const authorElement = createInputElement('author', 'Enter author name', 20);

    // Creating submit for adding new link: 
    const addButton = document.createElement('input');
    addButton.type = 'submit';
    addButton.value = 'ADD';
    addButton.classList.add('addButt');

    const formElement = document.createElement('form');
    formElement.classList.add('form');
    formElement.id = 'formm';
    formElement.appendChild(titleElement);
    formElement.appendChild(urlElement);
    formElement.appendChild(authorElement);
    formElement.appendChild(addButton);

    // Adding event listener to form: 
    formElement.addEventListener('submit', e => {
        e.preventDefault();

        // Creating new link object from input values:
        const newLink = new Link(titleElement.value, urlElement.value, authorElement.value);
        const newLinkElement = createLinkElement(newLink);

        //Replacing form with link:
        contentElement.replaceChild(newLinkElement, e.target);

        // Creating info message
        const infoElement = document.createElement('div');
        infoElement.classList.add('info');
        infoElement.textContent = `SUCCESS!`;
        contentElement.insertBefore(infoElement, newLinkElement);

        // Remove info message after 2 seconds: 
        setTimeout(() => {
            contentElement.removeChild(infoElement)
        }, 20000);
    });
    return formElement;
}

// Creating submit button: 

const submitButton = document.getElementById('button');
submitButton.addEventListener('click', () => {
    const firstLink = document.querySelector('.link');
    const formElement = createFormElement();
    contentElement.insertBefore(formElement, firstLink);
});

// Add each link to page: 
links.forEach(link => {
    const linkElement = createLinkElement(link);
    contentElement.appendChild(linkElement);
});