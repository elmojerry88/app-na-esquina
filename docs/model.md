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

### Category

- category_id : bigInt , primary key, unique
- parent_category_id : foreign key
- name : string
- image_url : string

### Brand 

- brand_id : bigInt , primary key, unique
- name : string
- image_url : string

### Product 

- product_id : ulid, primary key, unique 
- store_id : foregin key
- category_id : foregin key
- brand_id : foregin key
- user_id : foregin key
- name : string
- description : string
- price : float
- discount_price : float
- slug : string
- stock: integer
- created_at : datetime
- updated_at : datetime


### Product Image 

- product_image_id : bigInt, primary key, unique
- url : string
- is_primary : boolean
- created_at : datetime
- updated_at : datetime


### Whishlist

#### objetivo: Armazenar informações dos produtos desejado pelo usuário

- wishlist_id : bigInt, primary key, unique
- user_id : foreign key
- product_id : foreign key
- created_at : datetime

### User_preferences

#### objetivo: Armazenar as preferências de cada usuário (categorias e marcas)

- user_preferences_id : bigInt, primary key, unique
- user_id : foreign key
- category_id or brand_id : foreign key
- type : enum (category, brand)

### Product reviews

- product_reviews_id : bigInt, primary key, unique
- product_id : foreign key
- user_id : foreign key
- rating : integer
- comment : string
- created_at : datetime
- updated_at : datetime

### Discounts

- discount_id : ulid, primary key, unique
- name : string
- discount_percentage: float
- start_date : datetime
- end_date : datetime
- applicable_to : enum (product, category, global)
- created_at : datetime
- updated_at : datetime

### Coupons

- coupons_id : ulid, primary key, unique
- code : string
- discount_value : string
- minimum_order_value : integer
- expiration_date : datetime
- usage_limit : integer
- used_count : integer
- status : enum (active, desactive)
- created_at : datetime
- updated_at : datetime

### Promotion

- promotion_id : bigInt, primary key, unique
- name : string
- banner_url : string
- start_date : datetime
- end_date : datetime
- target_type : enum (product, category)
- target_id : foreign (product or category)
- created_at : datetime
- updated_at : datetime

### Shipping methods

- shipping_methods_id : bigInt, primary key, unique
- name : string
- estimated_delivery_days : integer
- base_price : float
- price_per_kg : float
- created_at : datetime
- updated_at : datetime

### Shipping rates

- shipping_rates_id
- shipping_method_id (relacionado a shipping_methods)
- region
- base_rate
- rate_per_kg
- created_at
- updated_at

### Payments
- payment_id : bigInt, primary key, unique
- method_name : string (cash, express, card)
- status : enum (active, inactive)
- created_atInt
- updated_at

### Order

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

### Order Items

- items_id : ulid, primary key, unique 
- order_id : foreign key
- product_id :  foreign key
- quantity : integer
- price : float
- total : float
- created_at : datetime
- updated_at : datetime

### Analytics