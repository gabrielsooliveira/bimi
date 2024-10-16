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
INSERT INTO users (name, email, password, created_at, updated_at) VALUES
('Ricardo Silva', 'ricardo@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()), -- Senha: password
('Maria Oliveira', 'maria@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()), -- Senha: password
('João Pereira', 'joao@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()); -- Senha: password
('Silvana Silva', 'silvana@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()), -- Senha: password
('Daniel Dantes', 'daniel@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()), -- Senha: password
('Sofia Souza', 'sofia@example.com',  '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NOW(), NOW()); -- Senha: password
