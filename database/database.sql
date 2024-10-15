-- Inserir dados na tabela services
INSERT INTO services (name, slug, description, has_plan, created_at, updated_at) VALUES
('Operadora A', 'phone', 'Operadora de Celular', TRUE, NOW(), NOW()),
('Saude Serv', 'health', 'Seguro de Saúde', TRUE, NOW(), NOW()),
('Empresa Energia', 'energy', 'Energia Elétrica', FALSE, NOW(), NOW());

-- Inserir dados na tabela plans
INSERT INTO plans (service_id, name, price, created_at, updated_at) VALUES
(1, 'Plano Básico', 99.99, NOW(), NOW()),
(1, 'Plano Intermediário', 109.99, NOW(), NOW()),
(1, 'Plano Avançado', 149.99, NOW(), NOW()),
(2, 'Pacote Básico', 89.99, NOW(), NOW()),
(2, 'Pacote Intermediário', 109.99, NOW(), NOW()),
(2, 'Pacote Premium', 129.99, NOW(), NOW());

-- Inserir dados na tabela users_energy
INSERT INTO users_energy (name, email, password, created_at, updated_at) VALUES
('Ricardo Silva', 'ricardo@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()), -- Senha: password
('Maria Oliveira', 'maria@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()), -- Senha: password
('João Pereira', 'joao@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()); -- Senha: password

-- Inserir dados na tabela users_phone
INSERT INTO users_phone (name, email, password, plan_id, created_at, updated_at) VALUES
('Tadeu Silva', 'tadeu@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NOW(), NOW()), -- Senha: password
('Rose Dantes', 'rose@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, NOW(), NOW()), -- Senha: password
('Joaquim Souza', 'joquim@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, NOW(), NOW()); -- Senha: password

-- Inserir dados na tabela users_health
INSERT INTO users_health (name, email, password, plan_id, created_at, updated_at) VALUES
('Silvana Silva', 'tadeu@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4, NOW(), NOW()), -- Senha: password
('Daniel Dantes', 'rose@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 4, NOW(), NOW()), -- Senha: password
('Sofia Souza', 'joquim@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 6, NOW(), NOW()); -- Senha: password
