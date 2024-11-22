function showSection(sectionId) {
    const sections = document.querySelectorAll('.content-section');
    sections.forEach((section) => {
        section.style.display = 'none';
    });

    document.getElementById(sectionId).style.display = 'block';
}
function setActiveButton(button) {
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(btn => btn.classList.remove('active'));

    button.classList.add('active');
}
