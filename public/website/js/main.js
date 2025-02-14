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
const menus = [
    {
        category: "Vorspeißen",
        items: [
            { name: "Weinblätter", price: "5.00€", description: "Petersilie, Bulgur, Tomaten, Zwiebeln, Zitronensaft und Olivenöl", imgSrc: "img/weinblätter.webp" },
            { name: "Muhammara", price: "5.00€", description: "Paprikapuree, mit Bulgur, Walnuss, Sesamsauce und Olivenöl", imgSrc: "img/Muhammara-3.jpg" },
            { name: "Hummus/+ Shawarma +1€", price: "5.00€", description: "Kichererbsen Püree mit Sesamsauce", imgSrc: "img/hummus.webp" },
            { name: "Käse Sambusek", price: "6.00€", description: "Frittierte Teig gefüllt mit Käse und Petersilie", imgSrc: "img/Käse sambusak.jpg" },
            { name: "Fleisch Sambusek", price: "6.00€", description: "Frittierte Teig gefüllt mit Fleisch", imgSrc: "img/Fleisch sambuak.jpg" },
            { name: "Kebbeh", price: "8.00€", description: "Gefüllte Weizenschrot Bällchen, Hackfleisch, Mandeln und Zwiebeln", imgSrc: "img/Kebbeh.jpg" },
            { name: "Pommes", price: "4.00€", description: "", imgSrc: "img/pommes.jpeg" },
            { name: "Mutabbal", price: "5.00€", description: "Auberginenpüree mit Sesamsauce, Olivenöl und Fleisch", imgSrc: "img/mutabel.jpg" },
        ],
    },
    {
        category: "Arabische Spezialitäten",
        items: [
            { name: "Fatte + Butter/  Fleisch +1€", price: "7.00€", description: "Gekochte Kichererbsen mit gerösteten Brotstücken, Sesamsauce, Zitronensaft und Mandeln", imgSrc: "img/fatte.jpg" },
            { name: "Foul mit Sesamsoße", price: "7.00€", description: "Dicke Bohnen gekocht mit Joghurt-Sesamsoße, Knoblauch dazu Brot", imgSrc: "img/R.jpeg" },
            { name: "Foul mit Olivenöl", price: "7.00€", description: "Dicke Bohnen gekocht mit Olivenöl, Knoblauch dazu Brot", imgSrc: "img/Foul olivenöl.jpg" },
        ],
    },
   
    {
        category: "Falafel",
        items: [
            { name: "Falafel Sandwich", price: "6.00€", description: "Kichererbsen Buletten in arabisches Fladenbrot mit Rüben, Tomaten, Petersilie und Sesam Sauce", imgSrc: "img/falafel (2).jpg" },
            { name: "6 Falafel Teller (6 Stück) mit Salat und Sauce", price:"6€", description: "", imgSrc: "img/Falafel.jpg" },
        ],
    },
    {
        category: "Gerill",
        items: [
            { name: "Kafta Libanesich", price: "15.00€ (1KG-50,00€)", description: "Hackfleischgrillspieß, Petersilie mit gegrillten Tomaten, Zwiebeln und Brot", imgSrc: "img/Kafta libanesich.webp" },
            { name: "Kabab Halabi", price: "15.00€ (1KG-50,00€)", description: "Hackfleischgrillspieß mit gegrillten Tomaten, Zwiebeln und Brot", imgSrc: "img/kabab halabi.jpg" },
            { name: "Hänschen Kabab", price: "15,00€", description: "Hähnchenfleischgrillspieß mit Salat, Knoblauchsoße und Brot", imgSrc: "img/hähnchen kabab.jpg" },
            { name: "Kabab Shikaf", price: "18,00€ (1KG-60,00€)", description: "Lammspieß mit gegrillten Tomaten, Zwiebeln, Birwas und Brot", imgSrc: "img/kabab shikef.jpeg" },
            { name: "Mix – Grill", price: "18,00€ (1KG-60,00€)", description: "Shish-Tawook, 2 Lammspieße mit gegrillten Tomaten, Zwiebeln und Brot", imgSrc: "img/Grillmix.jpg" },
            { name: "Lammleber", price: "15,00€", description: "Lammleber mit gegrillten Tomaten, Zwiebeln, Birwas und Brot", imgSrc: "Lammleber.jpg" },
            { name: "Shish Tawook", price: "15,00€", description: "Hähnchenbrustspieß mit Knoblauchsoße und Brot", imgSrc: "img/shish tawook.webp" },
            { name: "Chicken Wings", price: "13,00€ (1KG-45,00€)", description: "Hähnchenflügel mit Knoblauchsoße und Brotscharf", imgSrc: "img/chickenwings.jpg" },
            { name: "Halbe Hähnchen gegrillt/Ganzes Hähnchen gegrillt", price: "13,00€/25,00€", description: "Mit Knoblauchsoße und Brot", imgSrc: "img/hähnchen gegrillt.jpg" },
            { name: "Arayes-Maria", price: "10,00€", description: "Hackfleisch im Brot mit Zitrone, Hummus und Birwas", imgSrc: "img/ayrayes.jpg" },
            { name: "Dorade Fisch", price: "15,00€", description: "Gegrillte Dorade Fisch mit eingelegten Gurken, Rüben, Salat, Soße und Brot", imgSrc: "img/dorade Fisch.jpeg" },
        ],
    },
	{
        category: "Shawarma",
        items: [
            { name: "Shawarma Sandwich/Douple  ", price: "6,00€/7,50€", description: "Hähnchenspieß mit Beilagen und  Knoblauchsauce", imgSrc: "img/Shawarma.jpg" },
            { name: "Shawarma Arabi klein/groß ", price: "8,00€/14,00€", description: "Hänschenfleisch 1 oder 2 Rollo geschnitten mit Knoblauchsauce, eingelegten Gurken, Pommes und Coleslaw ", imgSrc: "img/Shawarma teller.jpg" },
            { name: "Shawarma Teller", price: "10,00€", description: "Hühnerfleisch mit Knoblauchsauce, eingelegten Gurken, Pommes und Coleslaw", imgSrc: "img/döner teller.png" },
        ],
    },
    {
        category: "Manakish",
        items: [
            { name: "Mohamara", price: "3,00€", description: "", imgSrc: "img/muhamara mankish.jpeg" },
            { name: "Thymian", price: "3,00€", description: "", imgSrc: "img/satar manakish.jpg" },
            { name: "Weißkäse", price: "3,00€", description: "", imgSrc: "img/manakish käse.jpg" },
            { name: "Hackfleisch", price: "3,00€", description: "", imgSrc: "img/fleisch manakish.jpg" },
            { name: "Thymian & Käse", price: "3,00€", description: "", imgSrc: "img/käse satar manakish.jpg" },
        ],
    },
    {
        category: "Menüs",
        items: [
            { name: "Broasted Halbes Hähnchen Menü", price: "10,00€", description: "Frittiertes Hähnchen mit Pommes, eingelegten Gurken & Coleslaw", imgSrc: "img/Brosted.jpg" },
            { name: "Crispy Menü Hähnchen", price: "10,00€", description: "Knuspriges Hähnchen mit Pommes, eingelegten Gurken und Coleslaw", imgSrc: "img/crispy.jpg" },
            { name: "Zenger Menü Hähnchen", price: "10,00€", description: "Scharfes knuspriges Hähnchen mit Pommes, eingelegten Gurken und Coleslaw", imgSrc: "img/Zenger.jpg" },
        ],
    },
    {
        category: "Pizzen Alle Pizzen mit Tomaten, Käse & Oregano ( 29cm )",
        items: [
            { name: "Pizzen aller art ", price: "7.50€-10€", imgSrc: "img/Pizzen.jpeg" },
               ],
    },
    {
        category: "Salate",
        items: [
            { name: "Tabouleh Salat", price: "6,00€", description: "Petersilie, Bulgur, Tomaten, Zwiebeln, Zitronensaft und Olivenöl", imgSrc: "img/tabuleh.jpg" },
            { name: "Drehspieß Salat", price: "8,00€", description: "Mit Eisbergsalat, Drehspieß und Soße", imgSrc: "img/drehspießsalat.png" },
            { name: "Fatoush", price: "6,00€", description: "Gurken, Tomaten, Minze, geröstetes Brot, Paprika, Radieschen, Zitronensaft und Olivenöl", imgSrc: "img/Fatoush.jpg" },
        ],
    },
    {
        category: "Snack Sandwich",
        items: [
            { name: "Crispy Sandwich", price: "6,00€", description: "Hähnchenfilet, Truthahn Stücke, Cheddar Käse, Knoblauch Dip. Pommes, Salat", imgSrc: "img/crispy sandwich.jpg" },
            { name: "Zenger Sandwich", price: "6,00€", description: "Hähnchenfilet, Truthahn Stücke, scharf, Cheddar Käse, Knoblauch Dip. Pommes, Salat", imgSrc: "img/crispy sandwich.jpg" },
            { name: "Hamburger (Kalb) mit Pommes", price: "8,00€", description: "", imgSrc: "img/burger.jpg" },
            { name: "Chicken Burger (Hähnchen) Pommes, Salat & Tomaten", price: "8,00€", description: "", imgSrc: "img/chicken burger.jpeg" },
        ],
    },
];

const menuContainer = document.getElementById('accordionMenu');

menus.forEach((menu,index) => {
    console.log(index);
    console.log(menu);
    const section = document.createElement('div');
    section.className = "accordion-item";
  
    const titleDiv = document.createElement('div');
    titleDiv.className = "d-flex justify-content-center mb-5";
    const button = document.createElement('button');
    button.setAttribute("type", "button");
    button.setAttribute("data-bs-toggle", "collapse");
    button.setAttribute("data-bs-target", `#collapse${index}`);
    if(index == 0){
        button.setAttribute("aria-expanded", "true");
    }
    else{
        button.setAttribute("aria-expanded", "false");
    }
    button.setAttribute("aria-controls", `collapse${index}`);
    const title = document.createElement('h5');
    title.className = "section-title ff-secondary text-center text-primary fw-normal";
    title.textContent = menu.category;
    titleDiv.appendChild(button);
    button.appendChild(title);
    section.appendChild(button);
    const row = document.createElement('div');
    row.className = "row g-4";

    menu.items.forEach(item => {
        const col = document.createElement('div');
        col.className = "col-lg-6";

        const itemDiv = document.createElement('div');
        itemDiv.className = "d-flex align-items-center";

        const img = document.createElement('img');
        img.className = "flex-shrink-0 img-fluid img-menu";
        img.src = item.imgSrc;
        img.alt = item.name;

        const textDiv = document.createElement('div');
        textDiv.className = "w-100 d-flex flex-column text-start ps-4";

        const itemName = document.createElement('h5');
        itemName.className = "d-flex justify-content-between border-bottom pb-2";
        itemName.innerHTML = `<span>${item.name}</span><span class="text-primary">${item.price}</span>`;

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
    if(index == 0){
        bodyMenu.className = "accordion-collapse collapse show";
    }
    else{
        bodyMenu.className = "accordion-collapse collapse";
    }
    bodyMenu.setAttribute("id", `collapse${index}`);
    bodyMenu.setAttribute("data-bs-parent", `#accordionMenu`);
    const bodyAccordion = document.createElement('div');
    bodyAccordion.className = "accordion-body";

    bodyMenu.appendChild(bodyAccordion);
    bodyAccordion.appendChild(row);
    section.appendChild(bodyMenu);
    menuContainer.appendChild(section);
});