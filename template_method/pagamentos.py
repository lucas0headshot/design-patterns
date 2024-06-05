# -*- coding: utf-8 -*-

from abc import ABC, abstractmethod

class MetodoPagamento(ABC):
    @abstractmethod
    def autorizar_pagamento(self, valor):
        pass

    @abstractmethod
    def processar_pagamento(self, valor):
        pass

class PagamentoCartaoCredito(MetodoPagamento):
    def autorizar_pagamento(self, valor):
        print(f"Autorização para R${valor} via cartão de crédito.")
        # Simula autorização de cartão de crédito
        return True

    def processar_pagamento(self, valor):
        print(f"Processando pagamento de R${valor} via cartão de crédito.")

class PagamentoPIX(MetodoPagamento):
    def autorizar_pagamento(self, valor):
        print(f"Autorização para R${valor} via PIX.")
        # Simula autorização via PIX
        return True

    def processar_pagamento(self, valor):
        print(f"Processando pagamento de R${valor} via PIX.")

class PagamentoDinheiro(MetodoPagamento):
    def autorizar_pagamento(self, valor):
        # Não precisa de autorização para pagamentos em dinheiro
        return True

    def processar_pagamento(self, valor):
        print(f"Por favor, pague R${valor} em dinheiro.")

class ProcessadorPagamento:
    def __init__(self, metodo_pagamento):
        self.metodo_pagamento = metodo_pagamento

    def compra(self, valor):
        if self.metodo_pagamento.autorizar_pagamento(valor):
            self.metodo_pagamento.processar_pagamento(valor)
            print("Pagamento realizado com sucesso.")
        else:
            print("Autorização de pagamento falhou.")

# Exemplo de uso
if __name__ == "__main__":
    metodo_pagamento = input("Escolha o método de pagamento (1 - Cartão de Crédito, 2 - Transferência Bancária, 3 - Dinheiro): ")

    if metodo_pagamento == '1':
        processador_pagamento = ProcessadorPagamento(PagamentoCartaoCredito())
    elif metodo_pagamento == '2':
        processador_pagamento = ProcessadorPagamento(PagamentoPIX())
    elif metodo_pagamento == '3':
        processador_pagamento = ProcessadorPagamento(PagamentoDinheiro())
    else:
        print("Escolha de método de pagamento inválida.")
        exit()

    valor = float(input("Digite o valor do pagamento: "))
    processador_pagamento.compra(valor)
