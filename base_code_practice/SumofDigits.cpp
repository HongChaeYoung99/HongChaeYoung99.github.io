#include <iostream>
using namespace std;

int cnt[50001];

int digit_sum(int x)
{
	int tmp, sum = 0;
	while(x>0)
	{
		tmp = x % 10;
		sum += tmp;
		x = x/10;
	}
	return sum;
}
int main(void)
{
//	freopen("input.txt", "rt", stdin);
	int n;
	scanf("%d",&n);
	int num, sum = 0, max = -2147000000, max_num;
	for (int i = 0; i < n ; i++)
	{
		scanf("%d", &num);
		sum = digit_sum(num);
		if(sum > max) {
			max = sum;
			max_num = num;
		}
		else if(max == sum)
			if(num > max_num)
				max_num = num;
	}
	printf("%d\n", max_num);
	
	return 0;
}
