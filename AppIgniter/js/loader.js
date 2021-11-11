window.onload = () =>{
    let loader = document.createElement('div');
    loader.style.position = "fixed";
    loader.style.top = "0px";
    loader.style.left = "0px";
    loader.style.width = "100%";
    loader.style.height = "100%";
    loader.style.background = "#fff";
    loader.style.display = "flex";
    loader.style.flexDirection = "column";
    loader.style.justifyContent = "center";
    loader.style.alignItems = "center";
    loader.style.background = "#fff";
    loader.style.zIndex = 10;
    loader.innerHTML = "<div class='lds-roller'><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>";

    document.body.appendChild(loader);

    setTimeout(() => {
        loader.style.opacity = 0;
        loader.style.zIndex = -1;
        setTimeout(() => {
            document.body.removeChild(loader);
        }, 100);
    }, 250 + Math.random());
}