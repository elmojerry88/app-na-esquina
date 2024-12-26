### 1 - Adress: 

#### objetivo: endereços de entrega e faturamento para usuários e vendedores.

- adress_id : bigInt, primary key, unique
- user_id : foreign key
- type : enum (shipping, billing, store)
- adress_line1 : string
- adress_line2 : string
- city : string 
- state : string
- created_at : datetime
- update_at : datetimee

### 2 - Role:

#### objetivo: Perfis e permissões de acesso no sistema.

- role_id : bigInt, primary key, unique
- name : string
- created_at : datetime
- updated_at : datetime


### 3 - User: 

#### objetivo: Armazena informações dos usuários (compradores, vendedores e administração do marketplace).

- user_id : uuid, primary key, unique
- role_id : foreign key
- name : string
- email : string
- phone : string
- birthday : date time
- city : string
- avatar_url : string
- status : enum (banned, verfied, pending)
- password : string


### 4 - Customer: 

#### objetivo: Detalhes adicionais dos compradores

- customer_id : uuid, primary key, unique
- user_id : foregin key
- adress_id : foreign key

### 5 - Store:

#### objetivo: Detalhes específicos sobre os vendedores, como loja, documentos, status de verificação, etc.

- store_id : uuid, primary key, unique
- user_id : foreign key
- adress_id : foreign key
- store_name : sting
- email_info : string
- nif : string, unique
- logo_url : string
- status : enum (pending, verified, banned)

### 6 - Categories:

#### objetivo: Armazenar as categorias e sub-categorias de produtos

- category_id : bigInt , primary key, unique
- parent_category_id : foreign key
- name : string
- slug : string
- image_url : string

### 7 - Brand: 

#### objetivo: Armazenar as marcas de produtos 

- brand_id : bigInt , primary key, unique
- name : string
- image_url : string

### 8 - Discounts:

#### objetivo: Armazenar os discontos 

- discount_id : ulid, primary key, unique
- store_id : foreign
- name : string
- discount_percentage: float
- start_date : datetime
- end_date : datetime
- applicable_to : enum (product, category, global)
- created_at : datetime
- updated_at : datetime

### 9 - Product:

#### objetivo: Os produtos registrados no marketplace

- product_id : ulid, primary key, unique 
- store_id : foregin key
- category_id : foregin key
- brand_id : foreign key
- discount_id : foreign key
- user_id : foregin key
- name : string
- description : string
- price : float
- slug : string
- stock: integer
- created_at : datetime
- updated_at : datetime


### 10 - Product Image:

#### objetivo: Armazena os links para as imagens dos produtos

- product_image_id : bigInt, primary key, unique
- product_id : foreign key
- url : string
- is_primary : boolean
- created_at : datetime
- updated_at : datetime


### 11 - Whishlist:

#### objetivo: Armazenar informações dos produtos desejado pelo usuário

- wishlist_id : bigInt, primary key, unique
- user_id : foreign key
- product_id : foreign key
- created_at : datetime

### 12 - User_preferences:

#### objetivo: Armazenar as preferências de cada usuário (categorias e marcas)

- user_preferences_id : bigInt, primary key, unique
- user_id : foreign key
- category_id or brand_id : foreign key
- type : enum (category, brand)

### 13 - Product reviews:

#### objetivo: Avaliações de cada produto

- product_reviews_id : bigInt, primary key, unique
- product_id : foreign key
- user_id : foreign key
- rating : integer
- comment : string
- created_at : datetime
- updated_at : datetime


### 14 - Coupons:

#### objetivo: Gerencia os coupons de desconto

- coupons_id : ulid, primary key, unique
- code : string
- discount_id : foreign key
- minimum_order_value : integer
- expiration_date : datetime
- usage_limit : integer
- used_count : integer
- status : enum (active, inactive)
- created_at : datetime
- updated_at : datetime

### 15 - Promotion:

#### objetivo: Gerenciar as promoções

- promotion_id : bigInt, primary key, unique
- name : string
- banner_url : string
- start_date : datetime
- end_date : datetime
- target_type : enum (product, category)
- target_id : foreign (product or category)
- created_at : datetime
- updated_at : datetime

### 16 - Shipping methods:

#### objetivo: Métodos de envio disponíveis para o marketplace.

- shipping_methods_id : bigInt, primary key, unique
- name : string
- estimated_delivery_days : integer
- base_price : float
- price_per_kg : float
- created_at : datetime
- updated_at : datetime

### 17 - Shipping rates: 

#### objetivo: Tarifas e prazos de entrega com base em regiões e métodos de envio.

- shipping_rates_id : bigInteger, primary key, unique
- shipping_method_id : foreign key
- region : string
- base_rate : integer
- rate_per_kg : float
- created_at : datetime
- updated_at : datetime

### 18 - Payments:

#### objetivo: Métodos de pagamento aceitos no marketplace.

- payment_id : bigInt, primary key, unique
- method_name : string (cash, express, card)
- status : enum (active, inactive)
- created_atInt
- updated_at

### 19 - Order:

#### objetivo: Pedidos 

- order_id : uuid. primary key, unique
- store_id : foreign key
- shipping_id : foreign key
- payment_id : foreign key
- status : enum (processing, failed, pending, completed, cancelled)
- total_amount : float
- payment_status : enum (pending, paid, failed, refunded)
- discount_amount : float
- tax_amount : float
- delivered_at
- created_at

### 20 - Order Items:

#### objetivo: Cada produto de um pedido

- items_id : ulid, primary key, unique 
- order_id : foreign key
- product_id :  foreign key
- quantity : integer
- price : float
- total : float
- created_at : datetime
- updated_at : datetime

### Analytics