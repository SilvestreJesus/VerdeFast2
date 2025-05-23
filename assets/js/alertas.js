let errors = document.querySelectorAll('.error');
let oks = document.querySelectorAll('.ok');
let infos = document.querySelectorAll('.info');
let warnings = document.querySelectorAll('.warning');

if (errors.length > 0) {
    setTimeout(() => { errors.forEach(error => error.style.opacity = '1'); }, 100);
    setTimeout(() => {
        errors.forEach(error => {
            error.style.transition = 'opacity 0.5s';
            error.style.opacity = '0';
        });
        setTimeout(() => {
            errors.forEach(error => error.remove());
        }, 400);
    }, 2000);
}

if (oks.length > 0) {
    setTimeout(() => { oks.forEach(ok => ok.style.opacity = '1'); }, 100);
    setTimeout(() => {
        oks.forEach(ok => {
            ok.style.transition = 'opacity 0.5s';
            ok.style.opacity = '0';
        });
        setTimeout(() => {
            oks.forEach(ok => ok.remove());
        }, 400);
    }, 2000);
}

if (infos.length > 0) {
    setTimeout(() => { infos.forEach(info => info.style.opacity = '1'); }, 100);
    setTimeout(() => {
        infos.forEach(info => {
            info.style.transition = 'opacity 0.5s';
            info.style.opacity = '0';
        });
        setTimeout(() => {
            infos.forEach(info => info.remove());
        }, 400);
    }, 4000);
}

if (warnings.length > 0) {
    setTimeout(() => { warnings.forEach(warning => warning.style.opacity = '1'); }, 100);
    setTimeout(() => {
        warnings.forEach(warning => {
            warning.style.transition = 'opacity 0.5s';
            warning.style.opacity = '0';
        });
        setTimeout(() => {
            warnings.forEach(warning => warning.remove());
        }, 400);
    }, 4000);
}