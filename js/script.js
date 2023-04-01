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

// api coinmarket
// Define a chave da API CoinMarketCap
const apiKey = 'd1136de6-b953-4370-b019-eebe1e4b768b'

// Define o endpoint da API CoinMarketCap
const endpoint =
  'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest'

// Define o parâmetro de consulta para obter os 10 principais tokens por capitalização de mercado
const queryParams = '?start=1&limit=10&convert=USD'

// Seleciona a tabela HTML
const table = document.querySelector('#crypto-table tbody')

// Cria uma nova instância do objeto XMLHttpRequest
const request = new XMLHttpRequest()

// Configura a solicitação HTTP GET para a API CoinMarketCap
request.open('GET', endpoint + queryParams, true)
request.setRequestHeader('X-CMC_PRO_API_KEY', apiKey)

// Define a ação a ser tomada quando a resposta for recebida da API CoinMarketCap
request.onload = function () {
  // Verifica se a resposta HTTP foi bem-sucedida
  if (request.status >= 200 && request.status < 400) {
    // Converte a resposta da API em um objeto JSON
    const response = JSON.parse(request.responseText)

    // Preenche a tabela HTML com os dados da resposta da API
    response.data.forEach((crypto, index) => {
      const row = table.insertRow()
      row.insertCell().textContent = index + 1
      row.insertCell().textContent = crypto.name
      row.insertCell().textContent = crypto.symbol
      row.insertCell().textContent = `$${crypto.quote.USD.price.toFixed(2)}`
      row.insertCell().textContent = `$${crypto.quote.USD.market_cap.toLocaleString()}`
    })
  } else {
    console.error('Erro ao receber resposta da API CoinMarketCap')
  }
}

// Envia a solicitação HTTP GET para a API CoinMarketCap
request.send()
