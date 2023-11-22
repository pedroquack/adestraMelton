    <style>
        h1{
            text-align: center
        }
        table{
            width: 100%
        }
        thead{
            width: 100%;
        }
        .thChamado{
            border: 1px solid black;
        }
        .trChamado{
            width: 100%
        }
        .trChamado td{
            border: 1px solid black
        }
    </style>
    <div>
        <h1>Relatorio de Chamados</h1>
        <table>
            <thead>
                <tr class="trChamado" style="text-align: center;">
                    <th class="thChamado">Nome do Tutor</th>
                    <th class="thChamado">Telefone</th>
                    <th class="thChamado">Nome do cão</th>
                    <th class="thChamado">Raça</th>
                    <th class="thChamado">Peso</th>
                    <th class="thChamado">Idade</th>
                    <th class="thChamado">Pessoas</th>
                    <th class="thChamado">Animais</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataChamado as $item)
        
                <tr class="trChamado">
                    <td>{{$item['nomeTutor']}}</td>
                    <td>{{$item['telefone']}}</td>
                    <td>{{$item['nomeCachorro']}}</td>
                    <td>{{$item['breed']}}</td>
                    <td>{{$item['peso']}}kg</td>
                    <td>{{$item['idade']}}</td>
                    <td>{{$item['pessoas']}}</td>
                    <td>{{$item['animais']}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <h1>Relatorio de Postagens</h1>
        <table>
            <thead>
                <tr class="trPost" style="text-align: center;">
                    <th class="thChamado">Nome do Cão</th>
                    <th class="thChamado">Raça</th>
                    <th class="thChamado">Peso</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPosts as $item)
                <tr class="trChamado">
                    <td>{{$item['nome']}}</td>
                    <td>{{$item['breed']}}</td>
                    <td>{{$item['peso']}}kg</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        
    </div>