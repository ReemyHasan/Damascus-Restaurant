(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();

})(jQuery);

const menuContainer = document.getElementById('accordionMenu');

menus.forEach((menu, index) => {
    const section = document.createElement('div');
    section.className = "accordion-item";

    const titleDiv = document.createElement('div');
    titleDiv.className = "d-flex justify-content-center mb-5";
    const button = document.createElement('button');
    button.setAttribute("type", "button");
    button.setAttribute("data-bs-toggle", "collapse");
    button.setAttribute("data-bs-target", `#collapse${index}`);
    button.setAttribute("aria-expanded", index === 0 ? "true" : "false");
    button.setAttribute("aria-controls", `collapse${index}`);

    const title = document.createElement('h5');
    title.className = "section-title ff-secondary text-center text-primary fw-normal";
    title.textContent = menu.title;

    button.appendChild(title);
    titleDiv.appendChild(button);
    section.appendChild(titleDiv);

    const row = document.createElement('div');
    row.className = "row g-4";

    menu.plates.forEach(item => {
        const col = document.createElement('div');
        col.className = "col-lg-6";

        const itemDiv = document.createElement('div');
        itemDiv.className = "d-flex align-items-center";

        const img = document.createElement('img');
        img.className = "flex-shrink-0 img-fluid img-menu";
        img.src = item.image ? item.image.webp : defaultImage;
        img.alt = item.title;

        const textDiv = document.createElement('div');
        textDiv.className = "w-100 d-flex flex-column text-start ps-4";

        const itemName = document.createElement('h5');
        itemName.className = "d-flex justify-content-between border-bottom pb-2";
        itemName.innerHTML = `<span>${item.title}</span><span class="text-primary">${item.price}</span>`;

        const description = document.createElement('small');
        description.className = "fst-italic";
        description.textContent = item.description;

        textDiv.appendChild(itemName);
        textDiv.appendChild(description);
        itemDiv.appendChild(img);
        itemDiv.appendChild(textDiv);
        col.appendChild(itemDiv);
        row.appendChild(col);
    });

    const bodyMenu = document.createElement('div');
    bodyMenu.className = `accordion-collapse collapse ${index === 0 ? 'show' : ''}`;
    bodyMenu.setAttribute("id", `collapse${index}`);
    bodyMenu.setAttribute("data-bs-parent", "#accordionMenu");

    const bodyAccordion = document.createElement('div');
    bodyAccordion.className = "accordion-body";

    bodyAccordion.appendChild(row);
    bodyMenu.appendChild(bodyAccordion);
    section.appendChild(bodyMenu);
    menuContainer.appendChild(section);
});
