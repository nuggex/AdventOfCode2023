# I Once Again Like to suffer


# Performance testing

### Specs
* PHP 8.1.13
* PHPBench 1.2.7
* Ryzen 9 5950X
* 64GB DDR4 @ 3600Mhz
* Asus X570-E Gaming
* Opcache disabled
* Xdebug disabled
* 10 000 revs


Tests are ran with
```
phpbench run .\DayXBench.php --report=default --revs 10000
```

# Day1

| iter | benchmark | subject    | set | revs  | mem_peak | time_avg    | comp_z_value | comp_deviation |
|------|-----------|------------|-----|-------|----------|-------------|--------------|----------------|
| 0    | Day1Bench | benchPart1 |     | 10000 | 543,968b | 1,501.017μs | +0.00σ       | +0.00%         |
| 0    | Day1Bench | benchPart2 |     | 10000 | 543,968b | 1,734.925μs | +0.00σ       | +0.00%         |


# Day2

| iter | benchmark | subject    | set | revs  | mem_peak | time_avg  | comp_z_value | comp_deviation |
|------|-----------|------------|-----|-------|----------|-----------|--------------|----------------|
| 0    | Day2Bench | benchPart1 |     | 10000 | 705,024b | 633.231μs | +0.00σ       | +0.00%         |
| 0    | Day2Bench | benchPart2 |     | 10000 | 706,200b | 664.682μs | +0.00σ       | +0.00%         |

# Day4

This isn't great...

| iter | benchmark | subject    | set | revs  | mem_peak     | time_avg      | comp_z_value | comp_deviation |
|------|-----------|------------|-----|-------|--------------|---------------|--------------|----------------|
| 0    | Day4Bench | benchPart1 |     | 10000 | 512,896b     | 678.178μs     | +0.00σ       | +0.00%         |
| 0    | Day4Bench | benchPart2 |     | 10000 | 192,034,544b | 318,017.699μs | +0.00σ       | +0.00%         |