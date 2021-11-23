create table `hits`
(
    id          bigint auto_increment primary key,
    link        nvarchar(500)                                                       not null,
    link_type   enum ('product', 'category', 'static-page', 'checkout', 'homepage') null,
    id_customer bigint                                                              not null,
    accessed_at datetime                                                            not null DEFAULT CURRENT_TIMESTAMP
);

-- indexes
create index hits_id_customer_index
    on hits (id_customer);

create index hits_accessed_at_index
    on hits (accessed_at);
