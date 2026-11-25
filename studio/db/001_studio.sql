CREATE TABLE IF NOT EXISTS studio_orders (
    number text PRIMARY KEY,
    design text NOT NULL,
    quantity integer NOT NULL CHECK (quantity > 0),
    pickup time NOT NULL,
    status text NOT NULL CHECK (status IN ('Queued', 'In progress', 'Ready'))
);
INSERT INTO studio_orders (number, design, quantity, pickup, status) VALUES
    ('FA-101', 'Garden rose bouquet', 2, '10:30', 'Ready'),
    ('FA-102', 'Dahlia centerpiece', 1, '12:00', 'In progress'),
    ('FA-103', 'Tulip hand-tie', 3, '14:15', 'Queued')
ON CONFLICT (number) DO NOTHING;
