let messageBox = document.querySelector('.messageBox');
let message;
function showMessaage(messageText)
{
    message = document.createElement('p');
    message.textContent = messageText;
    messageBox.appendChild(message);

    setTimeout(() =>
    {
        document.querySelectorAll('.messageBox > p')[0].remove();
    }, 3000);
}

const saveButton = document.querySelector('#save');
let sRazmer,
    sColor,
    sZapah,
    sForm;

let image = document.querySelector('.image');

let formi = document.querySelector('.formi');
formi.querySelectorAll('.forma').forEach(forma =>
{
    forma.addEventListener('click', (f) =>
    {
        document.querySelector('.h-formi > span.selected').textContent = f.target.dataset.name;
        image.querySelector('.image-form').style.backgroundImage = f.target.style.backgroundImage;

        formi.querySelectorAll('.forma').forEach(ff =>
        {
            ff.classList.remove('active');
        });
        f.target.classList.add('active');

        sForm = f.target.dataset.id;
        saveButton.href = `php/save.php?form=${sForm}&color=${sColor}&zapah=${sZapah}&razmer=${sRazmer}`;
    });
});


let colors = document.querySelector('.colors');
colors.querySelectorAll('.colors > .color').forEach(col =>
{
    col.addEventListener('click', (c) =>
    {
        document.querySelector('.h-colors > span.selected').textContent = c.target.dataset.name;
        image.querySelector('.image-color').style.backgroundColor = c.target.style.backgroundColor;

        colors.querySelectorAll('.color').forEach(cc =>
        {
            cc.classList.remove('active');
        });
        c.target.classList.add('active');

        sColor = c.target.dataset.id;
        saveButton.href = `php/save.php?form=${sForm}&color=${sColor}&zapah=${sZapah}&razmer=${sRazmer}`;
    });
});
colors.querySelector('.colors > .color:first-child').addEventListener('input', (c) =>
{
    document.querySelector('.h-colors > span.selected').textContent = c.target.dataset.name;
    image.querySelector('.image-color').style.backgroundColor = c.target.value;

    colors.querySelectorAll('.color').forEach(cc =>
    {
        cc.classList.remove('active');
    });
    c.target.classList.add('active');
});


let zapahi = document.querySelector('.zapahi');
zapahi.querySelectorAll('.zapah').forEach(zap =>
{
    zap.addEventListener('click', (z) =>
    {
        document.querySelector('.h-zapahi > span.selected').textContent = z.target.dataset.name;
        image.querySelector('.image-zapah').style.backgroundImage = z.target.style.backgroundImage;
    
        zapahi.querySelectorAll('.zapah').forEach(zz =>
        {
            zz.classList.remove('active');
        });
        z.target.classList.add('active');

        sZapah = z.target.dataset.id;
        saveButton.href = `php/save.php?form=${sForm}&color=${sColor}&zapah=${sZapah}&razmer=${sRazmer}`;
    });
});

let razmeri = document.querySelector('.razmeri');
razmeri.querySelectorAll('.razmer').forEach(raz =>
{
    raz.addEventListener('click', (r) =>
    {
        document.querySelector('.h-razmer > span.selected').textContent = r.target.textContent;
    
        razmeri.querySelectorAll('.razmer').forEach(rr =>
        {
            rr.classList.remove('active');
        });
        r.target.classList.add('active');

        sRazmer = r.target.dataset.id;
        saveButton.href = `php/save.php?form=${sForm}&color=${sColor}&zapah=${sZapah}&razmer=${sRazmer}`;
    });
});

saveButton.addEventListener('click', (e) =>
{
    e.preventDefault();

    if (!sColor)
    {
        showMessaage('Вы не выбрали цвет');
    }
    if (!sForm)
    {
        showMessaage('Вы не выбрали форму');
    }
    if (!sZapah)
    {
        showMessaage('Вы не выбрали аромат');
    }
    if (!sRazmer)
    {
        showMessaage('Вы не выбрали размер');
    }

    if (sColor && sForm && sZapah && sRazmer)
    {
        window.location.href = saveButton.href;
    }
});