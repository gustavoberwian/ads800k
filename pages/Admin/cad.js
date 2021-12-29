window.onload = function () {
    let loader = document.querySelector('.loader'),
        check = document.querySelector('.check');

    loader.classList.add('active');
    setTimeout(()=> {
        check.classList.add('active');
    },2000);

    document.alert('vtnc');

    setTimeout(()=>{
        loader.classList.remove('active');
        check.classList.remove('active');
    }, 1500);
};

