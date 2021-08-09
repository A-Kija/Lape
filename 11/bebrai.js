document.querySelectorAll('button').forEach(b => {
    b.addEventListener('click', e => {
        console.log(b.value);
        console.log(b.closest('div').querySelector('input').value);

        axios.post(postUrl, {
                kaDaryti: b.value,
                kiek: b.closest('div').querySelector('input').value
            })
            .then(function(response) {
                console.log(response.data);
                document.querySelector('#juodi').innerText = response.data.juodieji;
                document.querySelector('#rudi').innerText = response.data.rudieji;
                document.querySelectorAll('input').forEach(inp => inp.value = '');
            })
            .catch(function(error) {
                console.log(error);
            });

    });
});