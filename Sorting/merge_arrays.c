#include <stdio.h>

int main(void) {
	// your code goes here
	int list0[10] = {10,20,30,40,50,60,70,80,90,100};
	int list1[10] = {1,5,12,55,65,66,72,90,98,99};
	int merge[20] = {};
	int i=0,j=0,k;
	for(k=0;k<20;k++){
		if(list0[i]<list1[j] && i<10 && j<10){
			merge[k]=list0[i];
			i++;
			printf("1st else\ti=%d\t j=%d \t k=%d\n  ",i,j,k);

		}
		else if(list1[j]<list0[i] && i<10 && j<10){
			merge[k]=list1[j];
			j++;
			printf("2st else\ti=%d\t j=%d \t k=%d\n  ",i,j,k);

		}
		else if (list0[i]==list1[j] && i<10 && j<10) {
			merge[k]=list1[j];
			i++;j++;
			printf ("\nthis is the catch\n");
		}
		else if(i>=10 && j<10 ){
		merge[k]=list1[j++];
					printf("3rd else\ti=%d\n j=%d \t k=%d\n ",i,j,k);

		}
		else if(j>=10 && i<10){
		merge[k]=list0[i++];
					printf("1st else\ti=%d\t j=%d \t k=%d\n  ",i,j,k);
		}
	printf("%d\n",merge[k]);
	}
	return 0;
}
