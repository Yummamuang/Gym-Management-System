
const sections = document.getElementsByClassName('section');
const nav = document.getElementById('nav');
const navHeight = nav.clientHeight

Array.from(sections).forEach((section) => {
    section.style.height = `calc(100vh - ${navHeight}px )`;
});
