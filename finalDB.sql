SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS business, team_members, partners, competitive_analysis, opportunity, market, planned_marketing_efforts, sales_marketing, funding_requested, exit_and_amount, comparable_exits, additional_rounds;
SET FOREIGN_KEY_CHECKS=1;

CREATE TABLE business 
(
    business_code   varchar(5) PRIMARY KEY, 
    name            varchar(60),
    logo            blob, -- pathfile varchar
    city            varchar(50),
    state           varchar(2),
    address         varchar(50),
    zipcode         integer, -- no dash 65203, not 65203-0913
    description     text,
    phone_number    varchar(10),
    expiration_date datetime,
    email           varchar(40)
) ENGINE = INNODB;

-- this table handles the team memebers in each business 

CREATE TABLE team_members 
(
    username        varchar(20),
    salt            varchar(20),
    pw_hash         varchar(100),
    fname           varchar(50),
    lname           varchar(50),
    job_title       varchar(50),
    description     text,
    business_code   varchar(5),
    PRIMARY KEY (username),
    FOREIGN KEY (business_code) REFERENCES business(business_code) on delete cascade
) ENGINE = INNODB;

/*created this table since it didnt exists.*/
-- this table handles the partners in each business 
CREATE TABLE partners 
(   fname           varchar(50),
    lname           varchar(50),
    job_title       varchar(50),
    description     text,
    business_code   varchar(5),
    PRIMARY KEY (lname),
    FOREIGN KEY (business_code) REFERENCES business(business_code) on delete cascade
) ENGINE = INNODB;

-- this table handles the competitive analysis of each business

CREATE TABLE competitive_analysis (
    current_behavior        text,
    competitive_advantage   text,
    business_code           varchar(5),
    PRIMARY KEY (business_code),
    FOREIGN KEY (business_code) REFERENCES business(business_code) on delete cascade
) ENGINE = INNODB;

-- this table handles the opportunity part in the business

CREATE TABLE opportunity
(
    problem         text,
    solution        text,
    current_status  text, -- i added it since it was in the document
    how_validate1     text, -- i also added this (in pdf file)
    how_validate2    text, -- i added this (in pdf file)
    business_code   varchar(5),
    PRIMARY KEY (business_code),
    FOREIGN KEY (business_code) REFERENCES business(business_code) on delete cascade
) ENGINE = INNODB;

-- this table contains the market 

CREATE TABLE market (
    target_market           varchar(255),
    sustainable_advantage   text,
    business_code           varchar(5),
    FOREIGN KEY (business_code) REFERENCES business(business_code) on delete cascade,
    PRIMARY KEY (target_market)
) ENGINE = INNODB;

-- this table contains the planned marketing efforts part

CREATE TABLE planned_marketing_efforts (
    what            varchar(250),
    when_happens    varchar(70), -- beacuse in the pdf they can enter any text without a specific date or time.
    business_code   varchar(5),
    primary key (what),
    FOREIGN KEY (business_code) REFERENCES business(business_code) on delete cascade
) ENGINE = INNODB;

-- this table contains the sales_marketing part

create table sales_marketing
(
    first_goal varchar(70),
    second_goal varchar(70),
    business_code   varchar(5),
    primary key (business_code),
    FOREIGN KEY (business_code) REFERENCES business(business_code) on delete cascade
)ENGINE = INNODB;

-- this table does the funding requested

CREATE TABLE funding_requested 
(   what                    varchar(255),
    funding_needed          integer, -- i was woundering about the dollar sing how to represent it.
    financial_projections   text,
    when_milestone          varchar(50), -- i added when and what since they where udner the milestone post funding.
    business_code           varchar(5),
    primary key (what),
    FOREIGN KEY (business_code) REFERENCES business(business_code) on delete cascade
) ENGINE = INNODB;

-- this table contains the exit stratagy

create table exit_and_amount
(
    acquisition_amount   integer,
    exit_strategy       text,
    business_code       varchar(5),
    primary key (business_code),
    FOREIGN KEY (business_code) REFERENCES business(business_code) on delete cascade
) ENGINE = INNODB;

--this table contains other exit stratagies

CREATE TABLE comparable_exits (
    exit_plan       varchar(200),
    acquirer        varchar(50),
    company         varchar(50),
    business_code   varchar(5),
    primary key (exit_plan),
    FOREIGN KEY (business_code) REFERENCES business(business_code) on delete cascade
) ENGINE = INNODB;

--this table contains additional rounds

create table additional_rounds
(
    rounds text,
    regulatory_issue text,
    business_code   varchar(5),
    primary key (business_code),
    FOREIGN KEY (business_code) REFERENCES business(business_code) on delete cascade
) ENGINE = INNODB;

--This is where we create all of the indexes
CREATE INDEX business_description ON business(description);
CREATE INDEX funding_needed ON funding_requested(funding_needed);
CREATE INDEX competitive_advantage ON competitive_analysis(competitive_advantage);
CREATE INDEX solution ON opportunity(solution);
CREATE INDEX job_title ON team_members(job_title, description);