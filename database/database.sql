INSERT INTO servicos (nome, descricao, created_at, updated_at) VALUES
('Operadora de Celular', 'Planos de celular e internet móvel', NOW, NOW),
('Energia Elétrica', 'Cobranças de consumo de energia elétrica', NOW, NOW),
('Seguro de Saúde', 'Planos de seguro de saúde', NOW, NOW);

INSERT INTO clientes (nome, email, phone, cpf, address, birth, plan_id, service_id, created_at, updated_at) VALUES
('Ricardo Santos', 'ricardo@email.com', '11987654321', '12345678900', 'Rua A, 123, São Paulo, SP', '1985-05-12', 1, 1, NOW, NOW),
('Ana Silva', 'ana@email.com', '11987654322', '98765432100', 'Rua B, 456, Rio de Janeiro, RJ', '1990-07-20', 3, 2, NOW, NOW),
('João Oliveira', 'joao@email.com', '11987654323', '45678912300', 'Rua C, 789, Belo Horizonte, MG', '1992-11-30', 4, 3, NOW, NOW);
