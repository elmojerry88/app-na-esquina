### **Introdução**

Esses **services** seguem a lógica de separação de responsabilidades, cada um focado em resolver problemas específicos do domínio do marketplace. 
Essa abordagem modular facilita a manutenção, a escalabilidade e o teste do sistema. 

---

### **1. ProductService**
   - **Propósito**: Gerenciar produtos do marketplace.
   - **O que resolve**:
     - Criação, atualização, exclusão e recuperação de produtos.
     - Aplicação de validações específicas (ex.: o preço deve ser maior que zero).
     - Conversão de diferentes formatos de entrada para o formato esperado no sistema.
     - Integração com serviços externos para sincronização de catálogos de produtos.

---

### **2. OrderService**
   - **Propósito**: Gerenciar pedidos realizados pelos clientes.
   - **O que resolve**:
     - Criação de novos pedidos com validações (ex.: verificar disponibilidade de estoque).
     - Cálculo de valores, como impostos, descontos e frete.
     - Atualização do status do pedido (ex.: "pendente", "em processamento", "concluído").
     - Integração com gateways de pagamento para capturar transações.

---

### **3. PaymentService**
   - **Propósito**: Lidar com pagamentos de pedidos.
   - **O que resolve**:
     - Comunicação com provedores de pagamento (ex.: PayPal, Stripe, Mercado Pago).
     - Validação do status da transação (ex.: confirmar se o pagamento foi aprovado).
     - Tratamento de reembolsos ou estornos.
     - Gerenciamento de falhas em pagamentos (ex.: tempo limite, saldo insuficiente).

---

### **4. UserService**
   - **Propósito**: Gerenciar dados dos usuários.
   - **O que resolve**:
     - Registro, autenticação e recuperação de contas.
     - Atualização de perfis e informações pessoais.
     - Validação de permissões (ex.: vendedor vs. comprador).
     - Integração com sistemas de terceiros para autenticação social (ex.: Google, Facebook).

---

### **5. SellerService**
   - **Propósito**: Gerenciar os vendedores no marketplace.
   - **O que resolve**:
     - Cadastro e ativação de contas de vendedores.
     - Gerenciamento das permissões e roles dos vendedores.
     - Visualização de relatórios de vendas e estatísticas.
     - Validação de conformidade (ex.: documentação exigida para operar no marketplace).

---

### **6. InventoryService**
   - **Propósito**: Gerenciar o estoque dos produtos.
   - **O que resolve**:
     - Atualização do estoque em tempo real com base nos pedidos realizados.
     - Notificação de itens fora de estoque.
     - Integração com sistemas de logística para sincronização de inventário.
     - Cálculo de estoque reservado para pedidos pendentes.

---

### **7. ReviewService**
   - **Propósito**: Gerenciar avaliações e feedbacks de produtos ou vendedores.
   - **O que resolve**:
     - Adição, atualização e exclusão de avaliações.
     - Validação de conteúdo (ex.: impedir uso de linguagem ofensiva ou spam).
     - Exibição de médias de classificação em produtos e vendedores.
     - Prevenção de abuso (ex.: impedir múltiplas avaliações pelo mesmo usuário).

---

### **8. DeliveryService**
   - **Propósito**: Gerenciar o envio e rastreamento de pedidos.
   - **O que resolve**:
     - Cálculo de frete com base no peso, dimensões e distância.
     - Integração com transportadoras para gerar etiquetas de envio.
     - Rastreio do status de entrega (ex.: "enviado", "em trânsito", "entregue").
     - Notificação aos clientes sobre alterações no status do envio.

---

### **9. NotificationService**
   - **Propósito**: Enviar notificações para os usuários.
   - **O que resolve**:
     - Envio de e-mails, notificações push e mensagens SMS.
     - Gerenciamento de eventos que exigem comunicação (ex.: "pedido confirmado", "produto enviado").
     - Personalização de mensagens com base no comportamento ou preferências do usuário.
     - Integração com provedores de notificações (ex.: Twilio, Firebase).

---

### **10. CartService**
   - **Propósito**: Gerenciar o carrinho de compras do cliente.
   - **O que resolve**:
     - Adição, atualização e remoção de itens do carrinho.
     - Cálculo do valor total e aplicação de descontos no carrinho.
     - Validação de estoque para itens adicionados.
     - Persistência do carrinho (ex.: salvar o estado do carrinho para usuários autenticados).

---

### **11. DiscountService**
   - **Propósito**: Aplicar regras de desconto e cupons promocionais.
   - **O que resolve**:
     - Validação de cupons de desconto (ex.: verificar validade e restrições).
     - Aplicação de descontos automáticos com base em regras (ex.: "frete grátis acima de R$ 200").
     - Registro e rastreamento de uso de cupons.
     - Integração com campanhas promocionais.

---

### **12. AnalyticsService**
   - **Propósito**: Coletar e processar dados do marketplace.
   - **O que resolve**:
     - Monitoramento do desempenho de vendas.
     - Geração de relatórios para vendedores (ex.: produtos mais vendidos).
     - Coleta de métricas de uso para análise do comportamento do cliente.
     - Identificação de tendências e oportunidades para campanhas de marketing.

---

### **13. FraudDetectionService**
   - **Propósito**: Prevenir e mitigar fraudes no marketplace.
   - **O que resolve**:
     - Monitoramento de transações suspeitas (ex.: vários pedidos com o mesmo cartão de crédito).
     - Verificação de padrões de comportamento fraudulento.
     - Implementação de regras para bloquear transações ou contas suspeitas.
     - Integração com sistemas de terceiros para análise de riscos.

---

### **14. CategoryService**
   - **Propósito**: Gerenciar categorias e subcategorias de produtos.
   - **O que resolve**:
     - Criação, edição e exclusão de categorias.
     - Organização hierárquica (ex.: "Eletrônicos > Smartphones > Acessórios").
     - Exibição dinâmica de produtos em categorias específicas.
     - Filtragem de produtos com base nas categorias.

---

### **15. TaxService**
   - **Propósito**: Calcular impostos e taxas para os produtos.
   - **O que resolve**:
     - Cálculo automático de impostos com base na localização do comprador e do vendedor.
     - Integração com sistemas fiscais para manter a conformidade com as leis locais.
     - Geração de relatórios fiscais para vendedores e administradores.
     - Exibição transparente de impostos para os clientes no checkout.

---

### **16. ReportService**
   - **Propósito**: Gerar relatórios para administradores, vendedores e clientes.
   - **O que resolve**:
     - Relatórios de vendas, produtos mais vendidos, ou desempenho de vendedores.
     - Relatórios financeiros, como ganhos e despesas.
     - Relatórios de comportamento dos clientes (ex.: taxas de abandono de carrinho).

---

### **17. SubscriptionService

   - ** Propósito**: Gerenciar assinaturas de usuários ou vendedores.
   - ** O que resolve**:
      - Cadastro, renovação e cancelamento de assinaturas.
      - Validação de status da assinatura para acesso a funcionalidades premium.
      - Cálculo de valores recorrentes e notificações de renovação.

---
### **18. WishlistService

.   - ** Propósito**: Gerenciar listas de desejos dos usuários.
   - ** O que resolve**:
      - Adição e remoção de produtos em uma wishlist.
      - Integração com notificações para alertar quando o preço de um item cai ou volta ao estoque.
      - Persistência das listas para usuários autenticados.

---

### **19. RecommendationService

   - ** Propósito**: Oferecer recomendações personalizadas para os usuários.
   - ** O que resolve**:
      - Sugestão de produtos com base no histórico de compras ou navegação.
      - Integração com sistemas de aprendizado de máquina para sugestões mais precisas.
      - Exibição dinâmica de produtos relacionados em páginas específicas.

---

### **20. VendorPayoutService

    - **Propósito**: Gerenciar pagamentos para vendedores.
    - **O que resolve**:
     -  Cálculo do valor a ser transferido, descontando taxas de serviço.
     -  Agendamento e registro de pagamentos.
     -  Integração com sistemas bancários ou plataformas de pagamento.

---

### **21. AuditService

   - **Propósito**: Rastrear atividades realizadas no sistema.
   - **O que resolve**:
      - Registro de ações importantes (ex.: criação de pedidos, exclusão de produtos).
      - Geração de logs detalhados para auditoria e segurança.
      - Monitoramento de acessos não autorizados ou tentativas de fraude.

---

### **22. AuthService

   - **Propósito**: Autenticação no sistema
   - **O que resolve**:
      - Autenticação dos usuários e vendedores, como também da administração do marketplace
      - Geração de tokens, refreshTokens, e validação de refreshTokens.
      - Atualização e recuperação de password.

---

### **22. ImageService

   - **Propósito**: Gereciamento de imagens no sistema.
   - **O que resolve**:
      - Criação, atualização de imagens.

---

### **22. OtpService

   - **Propósito**: Gerenciamento de OTP (código de validação) no marketplace
   - **O que resolve**:
      - Gerar códicos OTP.
      - Controlo e validação de OTP's gerados.
      - Segurança e monitoramento de tentativas de confirmação de OTP's. 


## Levar em consideração a criação de um serviço para salvar imagens e um de OTP (código para validações)

