(function(){

    if (sessionStorage.fontsOK) {
        document.documentElement.classList.add('fonts-ok')
        return
    }

    if ('fonts' in document) {
    
        Promise.all([
            document.fonts.load('300 1em InterVariable'),
            document.fonts.load('700 1em InterVariable'),
            document.fonts.load('italic 1em InterVariable'),
            document.fonts.load('italic 700 1em InterVariable')
        ]).then(_ => {
            console.log("fonts loaded")
            document.documentElement.classList.add('fonts-ok')
            // Optimization for Repeat Views
            sessionStorage.fontsOK = true
        })
    }

})();
