<?php
  $apiKey = 'd1136de6-b953-4370-b019-eebe1e4b768b';
  $endpoint = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
  $ids = '1,1027,825,2781'; // 1 = Bitcoin, 1027 = Ethereum, 825 = Tether, 2781 = USD Coin
  $convert = 'BRL';

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => $endpoint . '?id=' . $ids . '&convert=' . $convert,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Accept: application/json",
      "X-CMC_PRO_API_KEY:". $apiKey
    ),
    CURLOPT_SSL_VERIFYHOST => false,
    CURLOPT_SSL_VERIFYPEER => false
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "Erro ao receber resposta da API CoinMarketCap: " . $err;
  } else {
    $responseObj = json_decode($response);
    $currencies = array();

    foreach ($responseObj->data as $id => $crypto) {
      $currency = new stdClass();
      $currency->name = $crypto->name;
      $currency->symbol = $crypto->symbol;
      $currency->price_brl = number_format($crypto->quote->BRL->price, 2);
      $currency->percent_change_24h = number_format($crypto->quote->BRL->percent_change_24h, 2);
      $currencies[] = $currency;
    }

    // foreach ($currencies as $currency) {
    //   echo $currency->name . ' (' . $currency->symbol . ') - Preço (BRL): R$' . $currency->price_brl . ' - Variação (24h): ' . $currency->percent_change_24h . '%<br>';
    // }
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Urbanist:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="icon"
      type="image/png"
      href="./img/favicon-32.png"
      sizes="32x32"
    />
    <link
      rel="icon"
      type="image/png"
      href="./img/favicon-16.png"
      sizes="16x16"
    />
    <!-- animation -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- main css -->
    <link rel="stylesheet" href="./css/style.css" />

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>bullbebtc</title>
  </head>
  <body>
    <main>
      <section class="main-menu">
        <div class="container">
          <div class="row" data-aos="fade-down">
            <header class="menu" data-aos="fade-down">
              <a href="#home" class="logo">
                <img src="./img/logo.png" alt="" />
              </a>
              <nav>
                <button class="btn btn-mobile-menu">
                  <div></div>
                  <div></div>
                  <div></div>
                </button>
                <ul>
                  <li><a href="#solutions">Soluções</a></li>
                  <li><a href="#who-we-are">Quem somos</a></li>
                  <li><a href="#how-to">Como usar</a></li>
                  <li><a href="#dev">DEV</a></li>
                  <li><a href="#get-in-touch">Contato</a></li>
                  <li>
                    <a href="#"><img src="./img/icon-globe.png" alt="" /></a>
                  </li>
                  <li>
                    <a href="#" class="btn btn-purple-pink"
                      >Conheça a Bullbetec</a
                    >
                  </li>
                </ul>
              </nav>
            </header>
          </div>
        </div>
      </section>
      <section class="home" id="home">
        <img
          src="./img/icon-floating-bitcoin.png"
          alt=""
          class="icon-floating"
        />
        <video muted autoplay loop class="bg_video">
          <source src="./video/bg.mp4" type="video/mp4" />
        </video>
        <div class="container">
          <div class="row">
            <div class="col col-text">
              <h1>
                Compre e venda cripto
                <span>simples e rápida.</span>
              </h1>
              <p>
                Compre Bitcoin ou USDT com a maior casa de cambio (OTC) do
                Brasil,surgimos grandes para pessoas grandes.
                <span>Operamos em toda America do Sul e Europa.</span>
              </p>
              <a href="#" class="btn btn-purple-pink">Conheça a Bullbebtc</a>
            </div>
            <div class="col col-animation">
              <img
                src="./img/illustration-home.png"
                alt=""
                class="illustration-home"
              />
            </div>
          </div>
        </div>
      </section>
      <section class="details">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2>Conhecendo a Bullbebtc</h2>
              <div class="boxes">
                <div class="box-gradient-border">
                  <div class="box-gradient-border-content">
                    <div class="circle-gradient-border" data-aos="zoom-in">
                      <div class="circle-gradient-border-content">
                        <img
                          src="./img/icon-whatsapp.png"
                          alt=""
                          class="icon"
                        />
                      </div>
                    </div>
                    <p>Atendimento exclusivo via Whatsapp</p>
                  </div>
                </div>
                <div class="box-gradient-border">
                  <div class="box-gradient-border-content">
                    <div class="circle-gradient-border" data-aos="zoom-in">
                      <div class="circle-gradient-border-content">
                        <img src="./img/icon-pix.png" alt="" class="icon" />
                      </div>
                    </div>
                    <p>Pagamento com PIX imediato</p>
                  </div>
                </div>
                <div class="box-gradient-border">
                  <div class="box-gradient-border-content">
                    <div class="circle-gradient-border" data-aos="zoom-in">
                      <div class="circle-gradient-border-content">
                        <img src="./img/icon-checked.png" alt="" class="icon" />
                      </div>
                    </div>
                    <p>Confiança e credibilidade no mercado</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="app">
        <img
          src="./img/icon-floating-ethereum.png"
          alt=""
          class="icon-floating"
        />
        <div class="container">
          <div class="row">
            <div class="col col-animation">
              <img src="./img/cellphone-2.png" alt="" class="cellphone" />
              <img src="./img/cellphone.png" alt="" class="cellphone-2" />
            </div>
            <div class="col">
              <h2>Aplicativo para gerenciar suas transações</h2>
              <ul>
                <li>Simples</li>
                <li>Moderno</li>
                <li>Eficiente</li>
              </ul>
              <a href="#" class="btn btn-purple-pink">Baixe o nosso app</a>
            </div>
          </div>
        </div>
      </section>
      <section class="price">
        <div class="container">
          <div class="row">
            <div class="col">
              <h2>Cotação de mercado</h2>
              <div class="boxes">
                <div class="box-gradient-border">
                  <div class="box-gradient-border-content">
                    <div class="circle-gradient-border" data-aos="zoom-in">
                      <div class="circle-gradient-border-content">
                        <img src="./img/icon-bitcoin.png" alt="" class="icon" />
                      </div>
                    </div>
                    <p>Bitcoin</p>
                    <div class="price-box">
                      <p><?php echo $currencies[0]->price_brl;?> BRL</p>
                    </div>
                  </div>
                </div>
                <div class="box-gradient-border">
                  <div class="box-gradient-border-content">
                    <div class="circle-gradient-border" data-aos="zoom-in">
                      <div class="circle-gradient-border-content">
                        <img
                          src="./img/icon-ethereum.png"
                          alt=""
                          class="icon"
                        />
                      </div>
                    </div>
                    <p>Ethereum</p>
                    <div class="price-box">
                      <p><?php echo $currencies[2]->price_brl;?> BRL</p>
                    </div>
                  </div>
                </div>
                <div class="box-gradient-border">
                  <div class="box-gradient-border-content">
                    <div class="circle-gradient-border" data-aos="zoom-in">
                      <div class="circle-gradient-border-content">
                        <img src="./img/icon-ust.png" alt="" class="icon" />
                      </div>
                    </div>
                    <p>USDT</p>
                    <div class="price-box">
                      <p><?php echo $currencies[1]->price_brl;?> BRL</p>
                    </div>
                  </div>
                </div>
                <div class="box-gradient-border">
                  <div class="box-gradient-border-content">
                    <div class="circle-gradient-border" data-aos="zoom-in">
                      <div class="circle-gradient-border-content">
                        <img src="./img/icon-dollar.png" alt="" class="icon" />
                      </div>
                    </div>
                    <p>USD</p>
                    <div class="price-box">
                      <p><?php echo $currencies[3]->price_brl;?> BRL</p>
                    </div>
                  </div>
                </div>
              </div>
              <a href="#" class="btn btn-purple-pink">Baixe o nosso app</a>
            </div>
          </div>
        </div>
      </section>
      <section class="how-to">
        <div class="container">
          <div class="row row-title">
            <div class="col">
              <h2>Como funciona</h2>
              <p>
                Descubra como nosso serviço simplifica a compra e venda de
                criptomoedas de forma segura e eficiente.
              </p>
            </div>
          </div>
          <div class="row row-road">
            <div class="col">
              <img src="./img/illustration-cellphone-balloons.png" alt="" />
              <div class="box-gradient-border" data-aos="flip-down">
                <div class="box-gradient-border-content">
                  <p class="title">Primeira etapa</p>
                  <p>Cliente entra em contato via chat ou Whatsapp</p>
                </div>
              </div>
              <div class="lines"></div>
            </div>
            <div class="col">
              <img src="./img/illustration-form.png" alt="" />
              <div class="box-gradient-border" data-aos="flip-down">
                <div class="box-gradient-border-content">
                  <p class="title">Segunda etapa</p>
                  <p>
                    Cliente efetua um cadasto e informa que moeda deseja comprar
                  </p>
                </div>
              </div>
              <div class="lines"></div>
            </div>
            <div class="col">
              <img src="./img/illustration-magnifier.png" alt="" />
              <div class="box-gradient-border" data-aos="flip-down">
                <div class="box-gradient-border-content">
                  <p class="title">Terceira etapa</p>
                  <p>Atendimento busca a melhor cotação</p>
                </div>
              </div>
              <div class="lines"></div>
            </div>
            <div class="col">
              <img src="./img/illustration-money.png" alt="" />
              <div class="box-gradient-border" data-aos="flip-down">
                <div class="box-gradient-border-content">
                  <p class="title">Finalização</p>
                  <p>
                    Cliente efetua o pagamento e após a confirmação vai receber
                    a compensação.
                  </p>
                </div>
              </div>
              <div class="lines"></div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <a href="#" class="btn btn-purple-pink">Baixe o nosso app</a>
            </div>
          </div>
        </div>
      </section>
      <section class="faq">
        <img
          src="./img/icon-floating-bitcoin.png"
          alt=""
          class="icon-floating"
        />
        <img
          src="./img/icon-floating-ethereum.png"
          alt=""
          class="icon-floating2"
        />
        <div class="container">
          <div class="row">
            <div class="col">
              <h2>Perguntas Frequentes</h2>
              <div class="accordion" data-aos="fade-right">
                <div class="question">
                  <p>Como funciona a BullbeBTC?</p>
                  <img src="./img/icon-arrow.png" alt="" />
                </div>
                <div class="answer">
                  <div class="content">
                    <p>
                      Oferecemos um serviço personalizado para o cliente que
                      deseja negociar ativos no balcão, trazendo o máximo de
                      segurança, agilidade e preços justos.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion" data-aos="fade-right">
                <div class="question">
                  <p>Quem somos?</p>
                  <img src="./img/icon-arrow.png" alt="" />
                </div>
                <div class="answer">
                  <div class="content">
                    <p>
                      A BullbeBTC foi fundada em 2023, com o intuito de trazer
                      soluções ao mercado de criptomoedas, blockchain,
                      arbitrando e intermediando. Nossa missão é prezar sempre
                      pela transparência, excelência e responsabilidade com cada
                      cliente, é através do nosso comprometimento que nos
                      consolidamos como uma das principais empresas do ramo no
                      Brasil, estando sempre aptos e ágeis para trazer a melhor
                      solução em criptos para você.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion" data-aos="fade-right">
                <div class="question">
                  <p>O que é Bitcoin?</p>
                  <img src="./img/icon-arrow.png" alt="" />
                </div>
                <div class="answer">
                  <div class="content">
                    <p>
                      Bitcoin é uma rede que funciona de forma consensual onde
                      foi possível criar uma nova forma de pagamento e também
                      uma nova moeda completamente digital. É a primeira rede de
                      pagamento descentralizada (ponto-a-ponto) onde os usuários
                      é que gerenciam o sistema, sem necessidade de
                      intermediador ou autoridade central. Da perspectiva do
                      usuário, Bitcoin funciona como dinheiro para a Internet.
                      Bitcoin também pode ser visto como o mais promissor
                      sistema de contabilidade de entrada tripla existente.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion" data-aos="fade-right">
                <div class="question">
                  <p>Como comprar?</p>
                  <img src="./img/icon-arrow.png" alt="" />
                </div>
                <div class="answer">
                  <div class="content">
                    <p>
                      Solicitando uma cotação em nosso site, preenchendo as
                      informações, logo você será direcionado para o nosso
                      atendimento exclusivo e personalizado para suprir sua
                      demanda.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion" data-aos="fade-right">
                <div class="question">
                  <p>Como vender?</p>
                  <img src="./img/icon-arrow.png" alt="" />
                </div>
                <div class="answer">
                  <div class="content">
                    <p>
                      Solicitando uma cotação em nosso site, preenchendo as
                      informações, logo você será direcionado para o nosso
                      atendimento exclusivo e personalizado para suprir sua
                      demanda.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion" data-aos="fade-right">
                <div class="question">
                  <p>O que determina o preço do Bitcoin?</p>
                  <img src="./img/icon-arrow.png" alt="" />
                </div>
                <div class="answer">
                  <div class="content">
                    <p>
                      O preço de um Bitcoin é determinado pela lei da oferta e
                      da demanda. Quando a demanda por bitcoins aumenta, o preço
                      aumenta, e quando a demanda cai, o preço cai. Há somente
                      um número limitado de bitcoins em circulação e novos
                      bitcoins são criados em uma taxa previsível e decrescente,
                      o que significa que a demanda deva seguir este nível de
                      inflação para manter seu preço estável. Como o Bitcoin
                      ainda é um mercado relativamente pequeno comparado ao que
                      ele poderia ser, não é necessário uma quantia muito
                      significativa de dinheiro para aumentar ou diminuir o
                      preço do mercado, portanto o preço de um bitcoin ainda é
                      bastante volátil.
                    </p>
                  </div>
                </div>
              </div>
              <div class="accordion" data-aos="fade-right">
                <div class="question">
                  <p>O Bitcoin é seguro?</p>
                  <img src="./img/icon-arrow.png" alt="" />
                </div>
                <div class="answer">
                  <div class="content">
                    <p>
                      A tecnologia Bitcoin - o protocolo e a criptografia - tem
                      um registro forte de segurança e a rede Bitcoin é
                      provavelmente o maior projeto de computação distribuída do
                      mundo. A vulnerabilidade mais comum do Bitcoin é o erro do
                      usuário. Os arquivos de carteira de Bitcoin que guardam as
                      chaves privadas necessárias, podem ser apagadas, roubadas
                      ou perdidas. Isto é bem parecido com dinheiro tradicional
                      mantido em formato digital. Afortunadamente, os usuários
                      podem utilizar boas práticas de segurança para proteger
                      seu dinheiro ou utilizar provedores de serviço que
                      oferecem bons níveis de seguro contra perda e roubo.
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col col-logo" data-aos="fade-up">
            <a href="#home">
              <img src="./img/logo-2.png" alt="" class="logo" />
            </a>
            <p>Descomplicada, inovadora e descentralizada</p>
            <div class="icons">
              <a href="#"><img src="./img/icon-whatsapp-2.png" alt="" /></a>
              <a href="#"><img src="./img/icon-mail.png" alt="" /></a>
            </div>
            <p>contato@bullbetc.com</p>
          </div>
          <div class="col">
            <ul class="menu-footer" data-aos="fade-up">
              <li><a href="#home">Home</a></li>
              <li><a href="#solutions">Soluções</a></li>
              <li><a href="#who-we-are">Quem somos</a></li>
              <li><a href="#how-to">Como usar</a></li>
              <li><a href="#dev">Dev</a></li>
              <li><a href="#get-in-touch">Contato</a></li>
            </ul>
          </div>
          <div class="col">
            <ul class="menu-footer" data-aos="fade-up">
              <li><a href="#">Política de prevenção a Lavagem</a></li>
              <li>
                <a
                  target="_blank"
                  href="./doc/BULLBEBTC-POLITICA-DE-PRIVACIDADE.pdf"
                  >Política de segurança da informação</a
                >
              </li>
              <li><a href="#">Política de KYC</a></li>
              <li><a href="#">Política de PLD</a></li>
              <li><a href="#">Termo de conduta e uso</a></li>
              <li><a href="#">Cadastro</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
    <!-- main script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init()
    </script>
    <script src="./js/script.js"></script>
  </body>
</html>
