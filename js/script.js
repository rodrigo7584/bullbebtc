const btnMobile = document.querySelector('button.btn-mobile-menu')
function toggleMenu() {
  const navMobile = document.querySelector('header.menu nav')
  btnMobile.classList.toggle('active')
  navMobile.classList.toggle('active')
}
btnMobile.addEventListener('click', toggleMenu)

const accordion = document.querySelectorAll('.accordion')

accordion.forEach(item => {
  const question = item.querySelector('.question')
  const answer = item.querySelector('.answer')

  const answerHeight = answer.scrollHeight
  answer.style.maxHeight = 0

  question.addEventListener('click', () => {
    // answer.classList.toggle('open')
    if (item.classList.contains('open')) {
      answer.style.maxHeight = 0
      item.classList.remove('open')
    } else {
      answer.style.maxHeight = answerHeight + 'px'
      item.classList.add('open')
    }
  })
})

function updateBtc() {
  // Cria um objeto XMLHttpRequest
  var xhr = new XMLHttpRequest()

  // Configura a requisição
  xhr.open('GET', 'https://www.mercadobitcoin.net/api/BTC/ticker/', true)

  // Configura o callback para quando a resposta chegar
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        // Converte a resposta JSON em um objeto
        var data = JSON.parse(xhr.responseText)

        // Obtém a cotação atual do Bitcoin em reais (BRL)
        var btcBrl = data.ticker.last

        // Atualiza o elemento
        var btcBrlElement = document.querySelector('.btc-price')
        console.log(typeof parseFloat(btcBrl))
        let formatted = parseFloat(btcBrl).toLocaleString('pt-BR', {
          style: 'currency',
          currency: 'BRL'
        })
        btcBrlElement.innerHTML = formatted
      } else {
        console.log('Erro na requisição: ' + xhr.status)
      }
    }
  }

  // Envia a requisição
  xhr.send()
}

// Chama a função para atualizar a cotação imediatamente
updateBtc()

// Chama a função a cada minuto
setInterval(updateBtc, 60000) // 60000 milissegundos = 1 minuto

function updateEth() {
  var xhr = new XMLHttpRequest()

  xhr.open('GET', 'https://www.mercadobitcoin.net/api/ETH/ticker/', true)

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var data = JSON.parse(xhr.responseText)

        var ethBrl = data.ticker.last

        var ethBrlElement = document.querySelector('.eth-price')
        console.log(typeof parseFloat(ethBrl))
        let formatted = parseFloat(ethBrl).toLocaleString('pt-BR', {
          style: 'currency',
          currency: 'BRL'
        })
        ethBrlElement.innerHTML = formatted
      } else {
        console.log('Erro na requisição: ' + xhr.status)
      }
    }
  }
  xhr.send()
}

updateEth()

setInterval(updateEth, 60000)

function updateUSDT() {
  var xhr = new XMLHttpRequest()

  xhr.open('GET', 'https://www.mercadobitcoin.net/api/USDT/ticker/', true)

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var data = JSON.parse(xhr.responseText)

        var usdtBrl = data.ticker.last

        var usdtBrlElement = document.querySelector('.usdt-price')
        console.log(typeof parseFloat(usdtBrl))
        let formatted = parseFloat(usdtBrl).toLocaleString('pt-BR', {
          style: 'currency',
          currency: 'BRL'
        })
        usdtBrlElement.innerHTML = formatted
      } else {
        console.log('Erro na requisição: ' + xhr.status)
      }
    }
  }
  xhr.send()
}

updateUSDT()

setInterval(updateUSDT, 60000)

function updateUSDP() {
  var xhr = new XMLHttpRequest()

  xhr.open('GET', 'https://www.mercadobitcoin.net/api/USDP/ticker/', true)

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var data = JSON.parse(xhr.responseText)

        var usdpBrl = data.ticker.last

        var usdpBrlElement = document.querySelector('.usdp-price')
        console.log(typeof parseFloat(usdpBrl))
        let formatted = parseFloat(usdpBrl).toLocaleString('pt-BR', {
          style: 'currency',
          currency: 'BRL'
        })
        usdpBrlElement.innerHTML = formatted
      } else {
        console.log('Erro na requisição: ' + xhr.status)
      }
    }
  }
  xhr.send()
}

updateUSDP()

setInterval(updateUSDP, 60000)
